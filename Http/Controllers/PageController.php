<?php
/**
 * Created by PhpStorm.
 * User: Cookiesoft
 * Date: 10/11/2017
 * Time: 23:01
 */

namespace Modules\Pages\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Pages\Models\Page;

use Location;

class PageController extends Controller
{

    /**
     * @var Page
     */
    private $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function index(){

        $pages = $this->page->all();

        return view('Page::index', compact('pages'));
    }

    public function view()
    {
        echo config('pages.home');
        echo config('pages.error_page');
        echo Location::getLocation();
    }
}