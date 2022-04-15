<?php
namespace App\Controller\Api;

use App\Controller\Api\ApiController;

/**
 * CPelaporan Controller
 *
 * @property \App\Model\Table\CPelaporanTable $CPelaporan
 *
 * @method \App\Model\Entity\CPelaporan[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CPelaporanController extends ApiController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Instansi', 'CPeriodePelaporan']
        ];
        $cPelaporan = $this->paginate($this->CPelaporan);
        $paging = $this->request->params['paging']['CPelaporan'];
        $cPelaporan = $this->addRowNumber($cPelaporan);

        $success = true;
        $message = '';
        $data = array(
            'limit' => $paging['perPage'],
            'page' => $paging['page'],
            'items' => $cPelaporan,
            'total_items' => $paging['count']
        );
        $this->setResponseData($data, $success, $message);
    }

    /**
     * View method
     *
     * @param string|null $id C Pelaporan id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $success = true;
        $message = '';

        $cPelaporan = $this->CPelaporan->get($id/*, [
            'contain' => ['Instansi', 'CPeriodePelaporan']
        ]*/);

        $this->setResponseData($cPelaporan, $success, $message);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $success = false;
        $message = '';
        $currentInstansi = $this->getCurrentInstansi();
        try {
            $id_pelaporan = $this->request->data['id'];
            if ($id_pelaporan) {
                $cPelaporan = $this->CPelaporan->get($id_pelaporan);
            } else {
                $cPelaporan = $this->CPelaporan->newEntity();
            }
            if ($this->request->is('post')) {
                // $this->request->data['instansi_id'] = $currentInstansi ? $currentInstansi->Id : '';
                // var_dump($this->request->getData());exit;
                $cPelaporan = $this->CPelaporan->patchEntity($cPelaporan, $this->request->getData());

                if ($this->CPelaporan->save($cPelaporan)) {
                    $success = true;
                    $message = __('Pelaporan berhasil disimpan.');
                } else {
                    $this->setErrors($cPelaporan->errors());
                    $message = __('Pelaporan tidak berhasil disimpan. Silahkan coba kembali.');
                }
            }
        } catch (\Exception $ex) {
            $message = $ex->getMessage();
        }

        $this->setResponseData($cPelaporan, $success, $message);
    }

    /**
     * Edit method
     *
     * @param string|null $id C Pelaporan id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $success = false;
        $message = '';
        $currentInstansi = $this->getCurrentInstansi();

        try {
            $cPelaporan = $this->CPelaporan->get($id);
            if ($this->request->is(['patch', 'post', 'put'])) {
                // $this->request->data['instansi_id'] = $currentInstansi ? $currentInstansi->Id : '';
                $cPelaporan = $this->CPelaporan->patchEntity($cPelaporan, $this->request->getData());

                if ($this->CPelaporan->save($cPelaporan)) {
                    $success = true;
                    $message = __('Pelaporan berhasil disimpan.');
                } else {
                    $this->setErrors($cPelaporan->errors());
                    $message = __('Pelaporan tidak berhasil disimpan. Silahkan coba kembali.');
                }
            }
        } catch (\Exception $ex) {
            $message = $ex->getMessage();
        }

        $this->setResponseData($cPelaporan, $success, $message);
    }

    /**
     * Delete method
     *
     * @param string|null $id C Pelaporan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cPelaporan = $this->CPelaporan->get($id);
        if ($this->CPelaporan->delete($cPelaporan)) {
            $this->Flash->success(__('The c pelaporan has been deleted.'));
        } else {
            $this->Flash->error(__('The c pelaporan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
