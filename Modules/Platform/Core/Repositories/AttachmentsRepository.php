<?php

namespace Modules\Platform\Core\Repositories;

use Bnb\Laravel\Attachments\Attachment;
use Modules\Platform\Core\Helper\FileHelper;

/**
 * Class AttachmentsRepository
 * @package Modules\Platform\Core\Repositories
 */
class AttachmentsRepository extends PlatformRepository
{
    public function model()
    {
        return Attachment::class;
    }




    /**
     * Sum and format storage
     *
     * @param $company
     * @param int $decimals
     * @return null|string
     */
    public function countFileSizeForCompanyFormatted($decimals=2)
    {

        $fileSizes = Attachment::all()->sum('filesize');

        if (!empty($fileSizes)) {

            return FileHelper::formatSize($fileSizes);

        }
        return 0;
    }

    /**
     * Sum all file sizes for company
     * @param $company
     * @return mixed
     */
    public function countFileSizeForCompany($company)
    {

        $fileSizes = Attachment::all()->sum('filesize');

        if (!empty($fileSizes)) {
            return $fileSizes/(1024*1024*1024);
        }
        return null;
    }

    public function findByKey($key)
    {
        try {
            return $this->findByField('key', $key);
        } catch (\Exception $exception) {
            return null;
        }
    }
}
