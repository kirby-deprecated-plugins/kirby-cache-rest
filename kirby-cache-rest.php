<?php
if(!c::get('cache.rest.lock', false)) {
    kirby()->routes([
        [
            'pattern' => c::get('cache.rest.flush.path', 'flush'),
            'action' => function() {
                global $kirby;

                $folders = c::get('cache.rest.flush.roots',[
                    $kirby->roots()->cache(),
                    $kirby->roots()->thumbs()
                ]);

                $results = [];
                $success_all = true;
                $count_all = 0;

                foreach($folders as $dirpath) {
                    $count = count(glob($dirpath . '/*'));
                    $count_all += $count;
                    $filename = pathinfo($dirpath)['basename'];

                    $flushed = dir::remove($dirpath, true);
                    $count = count(glob($dirpath . '/*'));

                    $success = ($count == 0) ? true : false;

                    $results['roots'][] = [
                        'count' => $count,
                        'root' => $dirpath,
                        'success' => $success,
                    ];

                    if(!$success || !$flushed) $success_all = false;
                }
                $results['success'] = $success_all;
                $results['flushed_files'] = $count_all;

                return new Response(json_encode($results), 'json', 200);
            }
        ],
    ]);
}