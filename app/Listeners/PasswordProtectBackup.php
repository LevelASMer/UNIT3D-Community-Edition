<?php
/**
 * NOTICE OF LICENSE.
 *
 * UNIT3D Community Edition is open-sourced software licensed under the GNU Affero General Public License v3.0
 * The details is bundled with this project in the file LICENSE.txt.
 *
 * @project    UNIT3D Community Edition
 *
 * @author     HDVinnie <hdinnovations@protonmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.en.html/ GNU Affero General Public License v3.0
 */

namespace App\Listeners;

use App\Helpers\BackupPassword;
use Spatie\Backup\Events\BackupZipWasCreated;

class PasswordProtectBackup
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param \Spatie\Backup\Events\BackupZipWasCreated $backupZipWasCreated
     *
     * @throws \PhpZip\Exception\ZipException
     *
     * @return string
     */
    public function handle(BackupZipWasCreated $backupZipWasCreated): string
    {
        return (new BackupPassword(new \App\Helpers\BackupEncryption(), $backupZipWasCreated->pathToZip))->path;
    }
}
