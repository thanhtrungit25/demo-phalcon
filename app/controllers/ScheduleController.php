<?php
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Mvc\Model\Query;

class ScheduleController extends ControllerBase
{

    public function indexAction()
    {
      if (!$this->session->has('auth')) {
        return $this->forward('index');
      }

      $auth = $this->session->get('auth');

      $user_id = intval($auth['id']);
      $schedules = Schedule::find(
        [
          "conditions" => "user_id = :user_id:",
          "bind" => ["user_id" => $user_id],
        ]
      );
      // echo '<pre>';print_r($schedules);die;

      if (count($schedules) == 0) {
        $this->flash->notice('Your schedule is empty!');
      }

      $this->view->schedules = $schedules;
    }

    public function addAction()
    {
      if (!$this->session->has('auth')) {
        return $this->forward('index');
      }

      $form = new ScheduleForm;
      // session data
      $auth = $this->session->get('auth');

      // Check whether the request was made with method POST
      if ($this->request->isPost()) {

          // Check whether the request was made with Ajax
          if ($this->request->isAjax()) {
            // var_dump($form->isValid($this->request->getPost()));die;

            $data = $this->request->getPost();

            $lat_start_x = $data['geoStart']['lat_start_x'];
            $lng_start_y = $data['geoStart']['lng_start_y'];

            $lat_end_x = $data['geoEnd']['lat_end_x'];
            $lng_end_y = $data['geoEnd']['lng_end_y'];

            $address_start = $data['address_start'];
            $address_end = $data['address_end'];

            // model save object
            $schedule = new Schedule();

            $schedule->lat_start_x = $lat_start_x;
            $schedule->lng_start_y = $lng_start_y;

            $schedule->lat_end_x = $lat_end_x;
            $schedule->lng_end_y = $lng_end_y;

            $schedule->address_start = $address_start;
            $schedule->address_end = $address_end;

            $schedule->user_id = $auth['id'];

            if ($schedule->save()) {
              $response_array['status'] = 'success';
              $response_array['message'] = 'Your schedule has been added successfully';
            } else {
              $response_array['status'] = 'error';
              $response_array['message'] = 'System error!!!';
            }

            return $this->response->setJsonContent($response_array);
          }
      }

      $this->view->form = $form;
    }

    public function findAction()
    {

      $form = new ScheduleForm;

      // Handle GET method submit
      if ($this->request->isAjax() && $this->request->isGet()) {

        $data = $this->request->getQuery();

        $lat_find_start_x = $data['geoStart']['lat_start_x'];
        $lng_find_start_y = $data['geoStart']['lng_start_y'];

        $lat_find_end_x = $data['geoEnd']['lat_end_x'];
        $lng_find_end_y = $data['geoEnd']['lng_end_y'];

        // $radius = $data['radius'];
        $radius = Radius::findFirstById($data['radius']);
        if ($radius) {
          $r = $radius->value;
        }

        $phql = "
          SELECT id, user_id, address_start, address_end, lat_start_x, lng_start_y, lat_end_x, lng_end_y,
          ( 6371 
            * acos( cos( radians(:lat_find_start_x:) ) 
            * cos( radians( lat_start_x ) ) 
            * cos( radians( lng_start_y ) - radians(:lng_find_start_y:) ) 
            + sin( radians(:lat_find_start_x:) ) 
            * sin( radians( lat_start_x ) ) ) 
          ) AS distance_start,
          ( 6371 
            * acos( cos( radians(:lat_find_end_x:) ) 
            * cos( radians( lat_end_x ) ) 
            * cos( radians( lng_end_y ) - radians(:lng_find_end_y:) ) 
            + sin( radians(:lat_find_end_x:) ) 
            * sin( radians( lat_end_x ) ) ) 
          ) AS distance_end

          FROM Schedule
          HAVING distance_start < :radius: AND distance_end < :radius:";

        $params = array(
          "lat_find_start_x" => $lat_find_start_x,
          "lng_find_start_y" => $lng_find_start_y,
          "lat_find_end_x" => $lat_find_end_x,
          "lng_find_end_y" => $lng_find_end_y,
          "radius" => $r
        );
        $schedules = $this->modelsManager->executeQuery($phql, $params);
        // echo var_dump($params);die;

        if (count($schedules) > 0) {
          $response_array['status'] = 'success';
          $response_array['message'] = 'Find results.';
          $response_array['schedules'] = $schedules;
        } else {
          $response_array['status'] = 'failed';
          $response_array['message'] = 'Sorry, we cannot find schedules results!!!.';
          $response_array['schedules'] = $schedules;
        }

        return $this->response->setJsonContent($response_array);
      }

      $this->view->form = $form;
    }

    public function addRequestAction()
    {
      $this->view->disable();
    }


}

