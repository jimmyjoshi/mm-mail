<?php

namespace App\Http\Controllers\Backend\Emailer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Emailer\EloquentEmailerRepository;
use App\Repositories\Subscriber\EloquentSubscriberRepository;
use App\Repositories\Category\EloquentCategoryRepository;
use App\Library\MailSender\MailSender;

/**
 * Class AdminEmailerController
 */
class AdminEmailerController extends Controller
{
	/**
	 * Repository
	 *
	 * @var object
	 */
	public $repository;

    /**
     * Create Success Message
     *
     * @var string
     */
    protected $createSuccessMessage = "Emailer Created Successfully!";

    /**
     * Edit Success Message
     *
     * @var string
     */
    protected $editSuccessMessage = "Emailer Edited Successfully!";

    /**
     * Delete Success Message
     *
     * @var string
     */
    protected $deleteSuccessMessage = "Emailer Deleted Successfully";

	/**
	 * __construct
	 *
	 * @param EloquentEmailerRepository $repository
	 */
	public function __construct(EloquentEmailerRepository $repository)
	{
        $this->repository           = $repository;
        $this->subscriberRepository = new EloquentSubscriberRepository;
        $this->categoryRepository   = new EloquentCategoryRepository;
	}

    /**
     * Template Listing
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view($this->repository->setAdmin(true)->getModuleView('listView'))->with([
            'repository' => $this->repository
        ]);
    }

    /**
     * Template View
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view($this->repository->setAdmin(true)->getModuleView('createView'))->with([
            'repository'            => $this->repository,
            'subscriberRepository'  => $this->subscriberRepository,
            'categories'            => $this->categoryRepository->getCategoriesWithSubscribers()
        ]);
    }

    public function show()
    {

    }

    /**
     * Store View Template
     *
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        $subscribers = $request->get('subscribers');
        $subscribers = explode(',', $subscribers);

        $this->repository->create($request->all(), $subscribers);

        return redirect()->route($this->repository->setAdmin(true)->getActionRoute('listRoute'))->withFlashSuccess($this->createSuccessMessage);
    }

    /**
     * Template View
     *
     * @return \Illuminate\View\View
     */
    public function edit($id, Request $request)
    {
        $model = $this->repository->findOrThrowException($id);

        return view($this->repository->setAdmin(true)->getModuleView('editView'))->with([
            'item'          => $model,
            'repository'    => $this->repository
        ]);
    }

    /**
     * Template Update
     *
     * @return \Illuminate\View\View
     */
    public function update($id, Request $request)
    {
        $status = $this->repository->update($id, $request->all());

        return redirect()->route($this->repository->setAdmin(true)->getActionRoute('listRoute'))->withFlashSuccess($this->editSuccessMessage);
    }

    /**
     * Template Delete
     *
     * @return \Illuminate\View\View
     */
    public function destroy($id)
    {
        $status = $this->repository->destroy($id);

        return redirect()->route($this->repository->setAdmin(true)->getActionRoute('listRoute'))->withFlashSuccess($this->deleteSuccessMessage);
    }

  	/**
     * Get Table Data
     *
     * @return json|mixed
     */
    public function getTableData()
    {
        return Datatables::of($this->repository->getForDataTable())
		    ->escapeColumns(['id', 'sort'])
            ->escapeColumns(['name', 'sort'])
            ->escapeColumns(['company_name', 'sort'])
            ->escapeColumns(['categoryname', 'sort'])
            ->escapeColumns(['mobile', 'sort'])
            ->escapeColumns(['email_id', 'sort'])
            ->escapeColumns(['username', 'sort'])
            ->addColumn('created_at', function($model)
            {
                return date('d-m-Y H:i A', strtotime($model->created_at));
            })
            ->addColumn('actions', function ($model) {
                return $model->admin_action_buttons;
            })
		    ->make(true);
    }
}
