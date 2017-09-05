<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Library\MailSender\MailSender;
use App\Repositories\Category\EloquentCategoryRepository;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

/**
 * Class AdminCategoriesController
 */
class AdminCategoriesController extends Controller
{
	/**
	 * Category Repository
	 *
	 * @var object
	 */
	public $repository;

    /**
     * Create Success Message
     *
     * @var string
     */
    protected $createSuccessMessage = "Category Created Successfully!";

    /**
     * Edit Success Message
     *
     * @var string
     */
    protected $editSuccessMessage = "Category Edited Successfully!";

    /**
     * Delete Success Message
     *
     * @var string
     */
    protected $deleteSuccessMessage = "Category Deleted Successfully";

	/**
	 * __construct
	 *
	 * @param EloquentCategoryRepository $repository
	 */
	public function __construct(EloquentCategoryRepository $repository)
	{
        $this->repository = $repository;
    }

    /**
     * Category Listing
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        /*$sender = new MailSender(10);
        $status = $sender->sendAllEmails();
        dd($status);
        die('test');*/
        return view($this->repository->setAdmin(true)->getModuleView('listView'))->with([
            'repository' => $this->repository
        ]);
    }

    /**
     * Category View
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view($this->repository->setAdmin(true)->getModuleView('createView'))->with([
            'repository' => $this->repository
        ]);
    }

    /**
     * Category View
     *
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        $this->repository->create($request->all());

        return redirect()->route($this->repository->setAdmin(true)->getActionRoute('listRoute'))->withFlashSuccess($this->createSuccessMessage);
    }

    /**
     * Category View
     *
     * @return \Illuminate\View\View
     */
    public function edit($id, Request $request)
    {
        $event = $this->repository->findOrThrowException($id);

        return view($this->repository->setAdmin(true)->getModuleView('editView'))->with([
            'item'          => $event,
            'repository'    => $this->repository
        ]);
    }

    /**
     * Category Update
     *
     * @return \Illuminate\View\View
     */
    public function update($id, Request $request)
    {
        $status = $this->repository->update($id, $request->all());

        return redirect()->route($this->repository->setAdmin(true)->getActionRoute('listRoute'))->withFlashSuccess($this->editSuccessMessage);
    }

    /**
     * Category Delete
     *
     * @return \Illuminate\View\View
     */
    public function destroy($id)
    {
        $status = $this->repository->destroy($id);

        return redirect()->route($this->repository->setAdmin(true)->getActionRoute('listRoute'))->withFlashSuccess($this->deleteSuccessMessage);
    }

    public function testAbc()
    {
        die('asdf');
    }

  	/**
     * Get Table Data
     *
     * @return json|mixed
     */
    public function getTableData()
    {
       return Datatables::of($this->repository->getForDataTable())
            ->escapeColumns(['name', 'sort'])
            ->escapeColumns(['username', 'sort'])
            ->escapeColumns(['name', 'sort'])
            ->addColumn('actions', function ($model) {
                return $model->admin_action_buttons;
            })
            ->make(true);
    }
}
