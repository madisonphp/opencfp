<?php

namespace OpenCFP\Http\Controller\Admin;

use OpenCFP\Http\Controller\BaseController;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends BaseController
{
    use AdminAccessTrait;

    private function indexAction(Request $req)
    {
        $user_mapper = $this->app['spot']->mapper('OpenCFP\Domain\Entity\User');
        $speaker_total = $user_mapper->all()->where(['last_login >' => '2015-06-01 00:00:00'])->count();

        $talk_mapper = $this->app['spot']->mapper('OpenCFP\Domain\Entity\Talk');
        $favorite_mapper = $this->app['spot']->mapper('OpenCFP\Domain\Entity\Favorite');
        $recent_talks = $talk_mapper->getRecent($this->app['sentry']->getUser()->getId());

        $admin_user_id = $this->app['sentry']->getUser()->getId();

        $templateData = array(
            'speakerTotal' => $speaker_total,
            'talkTotal' => $talk_mapper->all()->count(),
            'favoriteTotal' => $favorite_mapper->all()->where(['admin_user_id' => $admin_user_id])->count(),
            'selectTotal' => $talk_mapper->all()->where(['selected' => 1])->count(),
            'talks' => $recent_talks
        );

        return $this->render('admin/index.twig', $templateData);
    }
}
