<?php declare(strict_types = 1);

namespace Amp\Concurrent\Test\Worker;

use Amp\Concurrent\Worker\{ DefaultPool, WorkerFactory, WorkerThread };

/**
 * @group threading
 * @requires extension pthreads
 */
class ThreadPoolTest extends AbstractPoolTest {
    protected function createPool($min = null, $max = null) {
        $factory = $this->createMock(WorkerFactory::class);
        $factory->method('create')->will($this->returnCallback(function () {
            return new WorkerThread();
        }));

        return new DefaultPool($min, $max, $factory);
    }
}