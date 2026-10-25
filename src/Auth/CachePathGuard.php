<?php

declare(strict_types=1);

namespace Exsited\Sdk\Auth;

/**
 * The in-process half of the lock over one token cache path.
 *
 * One instance per cache file, shared by every store pointed at that file, rather than
 * one per store: `flock` on a second handle in the same process is granted rather than
 * refused, so two stores on one file that each held their own handle would both enter
 * the critical section.
 *
 * @internal not part of the published surface; see FileTokenStore.
 */
final class CachePathGuard
{
    public int $depth = 0;

    /** @var resource|null the sidecar handle the outermost acquisition holds */
    public $handle = null;

    /**
     * Why the last acquisition on this path was refused, or null while locking works.
     *
     * Re-armed on every success, so a condition that comes back after a recovery is
     * announced again instead of staying silent for the life of the process.
     */
    public ?string $refusalReason = null;

    public bool $refusalAnnounced = false;
}
