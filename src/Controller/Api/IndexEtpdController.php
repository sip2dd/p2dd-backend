<?php
namespace App\Controller\Api;

use App\Controller\Api\ApiController;
        

/**
 * IndexEtpd Controller
 *
 * @property \App\Model\Table\IndexEtpdTable $IndexEtpd
 *
 * @method \App\Model\Entity\IndexEtpd[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IndexEtpdController extends ApiController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Instansis', 'Periodes']
        ];
        $indexEtpd = $this->paginate($this->IndexEtpd);

        $this->set(compact('indexEtpd'));
    }

    /**
     * View method
     *
     * @param string|null $id Index Etpd id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $success = true;
        $message = '';

        $indexEtpd = $this->IndexEtpd->get($id/*, [
            'contain' => ['Instansis', 'Periodes']
        ]*/);

        $this->setResponseData($indexEtpd, $success, $message);
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
            $id = $this->request->data['id'];
            if ($id) {
                $indexEtpd = $this->IndexEtpd->get($id);
            } else {
                $indexEtpd = $this->IndexEtpd->newEntity();
            }
            if ($this->request->is('post')) {
                // $this->request->data['instansi_id'] = $currentInstansi ? $currentInstansi->Id : '';
                // var_dump($this->request->getData());exit;
                $indexEtpd = $this->IndexEtpd->patchEntity($indexEtpd, $this->request->getData());

                if ($this->IndexEtpd->save($indexEtpd)) {
                    $success = true;
                    $message = __('Pelaporan berhasil disimpan.');
                } else {
                    $this->setErrors($indexEtpd->errors());
                    $message = __('Pelaporan tidak berhasil disimpan. Silahkan coba kembali.');
                }
            }
        } catch (\Exception $ex) {
            $message = $ex->getMessage();
        }

        $this->setResponseData($indexEtpd, $success, $message);
        // $indexEtpd = $this->IndexEtpd->newEntity();
        // if ($this->request->is('post')) {
        //     $indexEtpd = $this->IndexEtpd->patchEntity($indexEtpd, $this->request->getData());
        //     if ($this->IndexEtpd->save($indexEtpd)) {
        //         $this->Flash->success(__('The index etpd has been saved.'));

        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('The index etpd could not be saved. Please, try again.'));
        // }
        // $instansis = $this->IndexEtpd->Instansis->find('list', ['limit' => 200]);
        // $periodes = $this->IndexEtpd->Periodes->find('list', ['limit' => 200]);
        // $this->set(compact('indexEtpd', 'instansis', 'periodes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Index Etpd id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $success = false;
        $message = '';
        $currentInstansi = $this->getCurrentInstansi();

        try {
            $indexEtpd = $this->IndexEtpd->get($id);
            if ($this->request->is(['patch', 'post', 'put'])) {
                // $this->request->data['instansi_id'] = $currentInstansi ? $currentInstansi->Id : '';
                $indexEtpd = $this->IndexEtpd->patchEntity($indexEtpd, $this->request->getData());

                if ($this->IndexEtpd->save($indexEtpd)) {
                    $success = true;
                    $message = __('Pelaporan berhasil disimpan.');
                } else {
                    $this->setErrors($indexEtpd->errors());
                    $message = __('Pelaporan tidak berhasil disimpan. Silahkan coba kembali.');
                }
            }
        } catch (\Exception $ex) {
            $message = $ex->getMessage();
        }

        $this->setResponseData($indexEtpd, $success, $message);
        // $indexEtpd = $this->IndexEtpd->get($id, [
        //     'contain' => []
        // ]);
        // if ($this->request->is(['patch', 'post', 'put'])) {
        //     $indexEtpd = $this->IndexEtpd->patchEntity($indexEtpd, $this->request->getData());
        //     if ($this->IndexEtpd->save($indexEtpd)) {
        //         $this->Flash->success(__('The index etpd has been saved.'));

        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('The index etpd could not be saved. Please, try again.'));
        // }
        // $instansis = $this->IndexEtpd->Instansis->find('list', ['limit' => 200]);
        // $periodes = $this->IndexEtpd->Periodes->find('list', ['limit' => 200]);
        // $this->set(compact('indexEtpd', 'instansis', 'periodes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Index Etpd id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $success = false;
        $message = '';
        $this->request->allowMethod(['post', 'delete']);
        try {
            //code...
            $indexEtpd = $this->IndexEtpd->get($id);
            if ($this->IndexEtpd->delete($indexEtpd)) {
                $success = true;
                $message = __('Pelaporan berhasil dihapus.');
            } else {
                $this->setErrors($indexEtpd->errors());
                $message = __('Pelaporan tidak berhasil dihapus. Silahkan coba kembali.');
            }
        } catch (\Exception $ex) {
            $message = $ex->getMessage();
        }

        $this->setResponseData($indexEtpd, $success, $message);
    }

}
