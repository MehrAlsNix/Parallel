<?php
/**
 * DocBlox
 *
 * PHP Version 5
 *
 * @category  DocBlox
 * @package   Parallel
 * @author    Mike van Riel <mike.vanriel@naenius.com>
 * @copyright 2010-2011 Mike van Riel / Naenius (http://www.naenius.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://docblox-project.org
 */

include __DIR__ . '/vendor/autoload.php';

// -----------------------------------------------------------------------------
// method 1: using a fluent interface and the addWorker helper.
// -----------------------------------------------------------------------------

$mgr = new \MehrAlsNix\Parallel\Manager();
$mgr
  ->addWorker(new \MehrAlsNix\Parallel\Worker(function() { sleep(1); return 'a'; }))
  ->addWorker(new \MehrAlsNix\Parallel\Worker(function() { sleep(1); return 'b'; }))
  ->addWorker(new \MehrAlsNix\Parallel\Worker(function() { sleep(1); return 'c'; }))
  ->addWorker(new \MehrAlsNix\Parallel\Worker(function() { sleep(1); return 'd'; }))
  ->addWorker(new \MehrAlsNix\Parallel\Worker(function() { sleep(1); return 'e'; }))
  ->execute();

foreach ($mgr as $worker) {
    var_dump($worker->getResult());
}

// -----------------------------------------------------------------------------
// method 2: using the manager as worker array
// -----------------------------------------------------------------------------

$mgr = new \MehrAlsNix\Parallel\Manager();
$mgr[] = new \MehrAlsNix\Parallel\Worker(function() { sleep(1); return 'f'; });
$mgr[] = new \MehrAlsNix\Parallel\Worker(function() { sleep(1); return 'g'; });
$mgr[] = new \MehrAlsNix\Parallel\Worker(function() { sleep(1); return 'h'; });
$mgr[] = new \MehrAlsNix\Parallel\Worker(function() { sleep(1); return 'i'; });
$mgr[] = new \MehrAlsNix\Parallel\Worker(function() { sleep(1); return 'j'; });
$mgr->execute();

/** @var Worker $worker */
foreach ($mgr as $worker) {
    var_dump($worker->getResult());
}
