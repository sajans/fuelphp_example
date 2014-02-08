<?php

class Controller_Posts extends Controller_Template {

    public function action_index() {
        //$data['posts'] = Model_Post::find('all');
        $posts = Model_Post::find('all');
        $comment_links = array();
        foreach ($posts as $post) {
            $results = DB::select()
                    ->from('comments')
                    ->where('message_id', $post->id)
                    ->execute();
            $count = count($results);
            if ($count == 0) {
                $comment_links[$post->id] = 'View';
            } else {
                $comment_links[$post->id] = $count . ' ' . Inflector::pluralize('Comment', $count);
            }
        }
        $view = View::forge('posts/index');
        $view->set('comment_links', $comment_links);
        $view->set('posts', $posts);
        $this->template->title = "Posts";
        $this->template->content = $view;
    }

    public function action_view($id = null) {
        is_null($id) and Response::redirect('posts');
        if (!$message = Model_Post::find($id)) {
            Session::set_flash('error', 'Could not find message #' . $id);
            Response::redirect('messages');
        }
        $comments = Model_Comment::find('all', array('where' => array('message_id' => $id)));

        $data = array(
            'message' => $message,
            'comments' => $comments
        );

        $this->template->title = "Post";
        $this->template->content = View::forge('posts/view', $data);
    }

    public function action_create() {
        $user = array();
        $user = Auth::get_user_id();
        $id = $user['1'];
        if (Input::method() == 'POST') {
            $val = Model_Post::validate('create');
            $_POST['user_id'] = $id;

            if ($val->run()) {
                $post = Model_Post::forge(array(
                            'title' => Input::post('title'),
                            'message' => Input::post('message'),
                            'user_id' => Input::post('user_id'),
                        ));

                if ($post and $post->save()) {
                    Session::set_flash('success', 'Added post #' . $post->id . '.');

                    Response::redirect('posts');
                } else {
                    Session::set_flash('error', 'Could not save post.');
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }
        // $view->user_id = $id;
        $this->template->title = "Posts";
        $this->template->content = View::forge('posts/create');
    }

    public function action_edit($id = null) {
        is_null($id) and Response::redirect('posts');

        if (!$post = Model_Post::find($id)) {
            Session::set_flash('error', 'Could not find post #' . $id);
            Response::redirect('posts');
        }

        $val = Model_Post::validate('edit');

        if ($val->run()) {
            $post->title = Input::post('title');
            $post->message = Input::post('message');

            if ($post->save()) {
                Session::set_flash('success', 'Updated post #' . $id);

                Response::redirect('posts');
            } else {
                Session::set_flash('error', 'Could not update post #' . $id);
            }
        } else {
            if (Input::method() == 'POST') {
                $post->title = $val->validated('title');
                $post->message = $val->validated('message');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('post', $post, false);
        }

        $this->template->title = "Posts";
        $this->template->content = View::forge('posts/edit');
    }

    public function action_delete($id = null) {
        is_null($id) and Response::redirect('posts');
        if ($post = Model_Post::find($id)) {
            $post->delete();
            Session::set_flash('success', 'Deleted post #' . $id);
        } else {
            Session::set_flash('error', 'Could not delete post #' . $id);
        }

        Response::redirect('posts');
    }

}
