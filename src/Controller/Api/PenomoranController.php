<?php
namespace App\Controller\Api;

use App\Model\Entity\Penomoran;

/**
 * Penomoran Controller
 *
 * @property \App\Model\Table\PenomoranTable $Penomoran
 */
class PenomoranController extends ApiController
{

    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event); // TODO: Change the autogenerated stub
        $this->Penomoran->setInstansi($this->getCurrentInstansi());
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $success = true;
        $message = '';

        $this->paginate = [
            'fields' => ['id', 'format', 'deskripsi', 'instansi_id', 'no_terakhir'],
            'conditions' => [
                'OR' => [
                    'LOWER(Penomoran.format) ILIKE' => '%' . $this->_apiQueryString . '%',
                    'LOWER(Penomoran.deskripsi) ILIKE' => '%' . $this->_apiQueryString . '%'
                ]
            ],
            'contain' => [
                'Instansi' => [
                    'fields' => ['id', 'nama', 'kode_daerah']
                ],
                'PenomoranDetail' => [
                    'fields' => ['id', 'penomoran_id', 'unit_id']
                ],
                'PenomoranDetail.Unit' => [
                    'fields' => ['id', 'nama', 'kode_daerah']
                ]
            ]
        ];

        $penomoran = $this->paginate($this->Penomoran);
        $paging = $this->request->params['paging']['Penomoran'];
        $penomoran = $this->addRowNumber($penomoran);

        $data = array(
            'limit' => $paging['perPage'],
            'page' => $paging['page'],
            'items' => $penomoran,
            'total_items' => $paging['count']
        );
        $this->setResponseData($data, $success, $message);
    }

    /**
     * View method
     *
     * @param string|null $id Penomoran id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $success = true;
        $message = '';

        $penomoran = $this->Penomoran->get($id, [
            'fields' => ['id', 'format', 'deskripsi', 'instansi_id', 'no_terakhir'],
            'contain' => [
                'Instansi' => [
                    'fields' => ['id', 'nama', 'kode_daerah']
                ],
                'PenomoranDetail' => [
                    'fields' => ['id', 'penomoran_id', 'unit_id']
                ],
                'PenomoranDetail.Unit' => [
                    'fields' => ['id', 'nama', 'kode_daerah']
                ]
            ]
        ]);

        $this->setResponseData($penomoran, $success, $message);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $success = false;
        $message = '';

        $penomoran = $this->Penomoran->newEntity();
        if ($this->request->is('post')) {
            $penomoran = $this->Penomoran->patchEntity($penomoran, $this->request->data, ['associated' => ['PenomoranDetail']]);
            if ($this->Penomoran->save($penomoran)) {
                $success = true;
                $message = __('Penomoran berhasil disimpan.');
            } else {
                $this->setErrors($penomoran->errors());
                $message = __('Penomoran tidak berhasil disimpan. Silahkan coba kembali.');
            }
        }
        $this->setResponseData($penomoran, $success, $message);
    }

    /**
     * Edit method
     *
     * @param string|null $id Penomoran id.
     * @return \Cake\Http\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Http\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $success = false;
        $message = '';

        $penomoran = $this->Penomoran->get($id, [
            'fields' => ['id', 'format', 'deskripsi', 'instansi_id', 'no_terakhir'],
            'contain' => [
                'Instansi' => [
                    'fields' => ['id', 'nama', 'kode_daerah']
                ],
                'PenomoranDetail' => [
                    'fields' => ['id', 'penomoran_id', 'unit_id']
                ],
                'PenomoranDetail.Unit' => [
                    'fields' => ['id', 'nama', 'kode_daerah']
                ]
            ]
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $penomoran = $this->Penomoran->patchEntity($penomoran, $this->request->data, ['associated' => ['PenomoranDetail']]);
            if ($this->Penomoran->save($penomoran)) {
                $success = true;
                $message = __('Penomoran berhasil disimpan.');
            } else {
                $this->setErrors($penomoran->errors());
                $message = __('Penomoran tidak berhasil disimpan. Silahkan coba kembali.');
            }
        }
        $this->setResponseData($penomoran, $success, $message);
    }

    /**
     * Delete method
     *
     * @param string|null $id Penomoran id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $success = false;
        $message = '';
        $data = array();

        $this->request->allowMethod(['post', 'delete']);
        $penomoran = $this->Penomoran->get($id);
        if ($this->Penomoran->delete($penomoran)) {
            $success = true;
            $message = __('Penomoran berhasil dihapus.');
        } else {
            $message = __('Penomoran tidak berhasil dihapus. Silahkan coba kembali.');
        }
        $this->setResponseData($data, $success, $message);
    }

    /**
     * Delete method
     *
     * @param string|null $id Penomoran id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteDetail($id = null)
    {
        $success = false;
        $message = '';
        $data = array();

        $this->request->allowMethod(['post', 'delete']);
        $penomoran = $this->Penomoran->PenomoranDetail->get($id);
        if ($this->Penomoran->PenomoranDetail->delete($penomoran)) {
            $success = true;
            $message = __('Penomoran Detail berhasil dihapus.');
        } else {
            $message = __('Penomoran Detail tidak berhasil dihapus. Silahkan coba kembali.');
        }
        $this->setResponseData($data, $success, $message);
    }

    public function getList()
    {
        $success = true;
        $message = '';

        $penomoran = $this->Penomoran->find('all', [
            'fields' => ['id', 'format', 'deskripsi'],
            'conditions' => [
                'OR' => [
                    'LOWER(Penomoran.deskripsi) ILIKE' => '%' . $this->_apiQueryString . '%'
                ]
            ],
            'limit' => $this->_autocompleteLimit
        ]);

        $data = array(
            'items' => $penomoran
        );

        $this->setResponseData($data, $success, $message);
    }
}
