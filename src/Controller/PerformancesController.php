<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Performances Controller
 *
 * @property \App\Model\Table\PerformancesTable $Performances
 *
 * @method \App\Model\Entity\Performance[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PerformancesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = array(
            'contain' => ['Institutions'],
            'order' => array('Performances.general_grades' => 'DESC'),
        );

        $performances = $this->paginate($this->Performances);

        $this->set(compact('performances'));
    }

    /**
     * View method
     *
     * @param string|null $id Performance id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $performance = $this->Performances->get($id, [
            'contain' => ['Institutions'],
        ]);

        $this->set('performance', $performance);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $performance = $this->Performances->newEntity();
        if ($this->request->is('post')) {
            $performance = $this->Performances->patchEntity($performance, $this->request->getData());
            if ($this->Performances->save($performance)) {
                $this->Flash->success(__('The performance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The performance could not be saved. Please, try again.'));
        }
        $institutions = $this->Performances->Institutions->find('list', ['limit' => 200]);
        $this->set(compact('performance', 'institutions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Performance id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $performance = $this->Performances->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $performance = $this->Performances->patchEntity($performance, $this->request->getData());
            if ($this->Performances->save($performance)) {
                $this->Flash->success(__('The performance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The performance could not be saved. Please, try again.'));
        }
        $institutions = $this->Performances->Institutions->find('list', ['limit' => 200]);
        $this->set(compact('performance', 'institutions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Performance id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $performance = $this->Performances->get($id);
        if ($this->Performances->delete($performance)) {
            $this->Flash->success(__('The performance has been deleted.'));
        } else {
            $this->Flash->error(__('The performance could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function search(){
        //print_r($this->request->data['value']);
        $text = strtolower($this->request->data['value']);
        $query = $this->Performances->find('all')
        ->where(['performance_id' => $text])
        ->orWhere(['general_grades' => $text])
        ->orWhere(['course_grades' => $text])
        ->orWhere(['course_avgs' => $text])
        ->orWhere(['course_names LIKE' => '%' . $text . '%'])
        ->orWhere(['Institutions.names LIKE' => '%' . $text . '%'])
        ->contain(['Institutions']);

        $results = $this->paginate($query);

        $this->set(compact('results'));
    }
}
