<?php

namespace App\Controllers;

use Myth\Auth\Password;
use App\Models\ProductModel;
use App\Models\Customer\Order_model;
use App\Models\Customer\Payment_model;
use App\Models\Customer\Review_model;
use App\Models\ReviewModel;
use phpDocumentor\Reflection\Types\This;

class Customer_Reviews extends BaseController
{
    protected $validation;
    protected $payment;
    protected $order;
    protected $review;
    protected $session;
    protected $load;
    protected $pagination;
    protected $uri;
    protected $form_validation;
    protected $input;
    public function __construct()
    {
        $this->validation =  \Config\Services::validation();
        $this->payment = new Payment_model();
        $this->order = new Order_model();
        $this->review = new Review_model();
        $this->session = session();
    }

    public function index()
    {
        $params['title'] = 'Review Saya';

        $config['base_url'] = site_url('customer/reviews/index');
        $config['total_rows'] = $this->review->count_all_reviews();
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);

        $config['first_link']       = '«';
        $config['last_link']        = '»';
        $config['next_link']        = '›';
        $config['prev_link']        = '‹';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->load->library('pagination', $config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $reviews['reviews'] = $this->review->get_all_reviews($config['per_page'], $page);
        $reviews['pagination'] = $this->pagination->create_links();

        $this->load->view('header', $params);
        $this->load->view('reviews/reviews', $reviews);
        $this->load->view('footer');

        return view('customers/reviews/reviews', $reviews);
    }

    public function write()
    {
        $params['title'] = 'Tulis Review';

        $review['orders'] = $this->order->all_orders();

        $this->load->view('header', $params);
        $this->load->view('reviews/write', $review);
        $this->load->view('footer');
    }

    public function write_me()
    {
        $this->form_validation->set_error_delimiters('<div class="text-danger font-weight-bold">', '</div>');

        $this->form_validation->set_rules('title', 'Judul Review', 'required');
        $this->form_validation->set_rules('order_id', 'required|numeric');
        $this->form_validation->set_rules('review', 'Isi review', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->write();
        } else {
            $title = $this->input->post('title');
            $order = $this->input->post('order_id');
            $review = $this->input->post('review');

            $data = array(
                'user_id' => get_current_user_id(),
                'title' => $title,
                'order_id' => $order,
                'review_text' => $review,
                'review_date' => date('Y-m-d H:i:s')
            );

            $id = $this->review->write_review($data);

            $this->session->set_flashdata('review_flash', 'Review berhasil dikirimkan');
            redirect('customer/reviews/view/' . $id);
        }
    }

    public function view($id = 0)
    {
        if ($this->review->is_review_exist($id)) {
            $data = $this->review->review_data($id);

            $params['title'] = 'Review Order #' . $data->order_number;

            $review['review'] = $data;

            $this->load->view('header', $params);
            $this->load->view('reviews/view', $review);
            $this->load->view('footer');
        } else {
            show_404();
        }
    }

    public function delete($id)
    {
        if ($this->review->is_review_exist($id)) {
            $this->review->delete($id);

            $this->session->set_flashdata('review_flash', 'Review berhasil dihapus');
            redirect('customer/reviews');
        } else {
            show_404();
        }
    }
}
