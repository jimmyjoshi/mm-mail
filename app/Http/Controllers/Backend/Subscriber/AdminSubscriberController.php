<?php

namespace App\Http\Controllers\Backend\Subscriber;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Subscriber\EloquentSubscriberRepository;

/**
 * Class AdminSubscriberController
 */
class AdminSubscriberController extends Controller
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
    protected $createSuccessMessage = "Subscriber Created Successfully!";

    /**
     * Edit Success Message
     * 
     * @var string
     */
    protected $editSuccessMessage = "Subscriber Edited Successfully!";

    /**
     * Delete Success Message
     * 
     * @var string
     */
    protected $deleteSuccessMessage = "Subscriber Deleted Successfully";

	/**
	 * __construct
	 * 
	 * @param EloquentSubscriberRepository $repository
	 */
	public function __construct(EloquentSubscriberRepository $repository)
	{
        $this->repository = $repository;
	}

    /**
     * Subscriber Listing 
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
     * Subscriber View
     * 
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view($this->repository->setAdmin(true)->getModuleView('createView'))->with([
            'repository' => $this->repository
        ]);
    }

    public function show()
    {

    }

    /**
     * Store View
     * Subscriber
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        $this->repository->create($request->all());

        return redirect()->route($this->repository->setAdmin(true)->getActionRoute('listRoute'))->withFlashSuccess($this->createSuccessMessage);
    }

    /**
     * Subscriber View
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
     * Subscriber Update
     * 
     * @return \Illuminate\View\View
     */
    public function update($id, Request $request)
    {
        $status = $this->repository->update($id, $request->all());
        
        return redirect()->route($this->repository->setAdmin(true)->getActionRoute('listRoute'))->withFlashSuccess($this->editSuccessMessage);
    }

    /**
     * Subscriber Update
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
		    ->escapeColumns(['name', 'sort'])
            ->escapeColumns(['company_name', 'sort'])
            ->escapeColumns(['categoryname', 'sort'])
            ->escapeColumns(['mobile', 'sort'])
            ->escapeColumns(['email_id', 'sort'])
            ->escapeColumns(['username', 'sort'])
            ->addColumn('actions', function ($model) {
                return $model->admin_action_buttons;
            })
		    ->make(true);
    }
}
