<?php
class ControllerExtensionModuleMagikbrezza extends Controller {
    private $error = array(); // This is used to set the errors, if any.
 
    public function index() {
        // Loading the language file of magikbrezza
        $this->load->language('extension/module/magikbrezza'); 
     
        // Set the title of the page to the heading title in the Language file i.e., Hello World
        $this->document->setTitle(strip_tags($this->language->get('heading_title')));
     
        // Load the Setting Model  (All of the OpenCart Module & General Settings are saved using this Model )
        $this->load->model('setting/setting');
     
        // Start If: Validates and check if data is coming by save (POST) method
        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {

            // Parse all the coming data to Setting Model to save it in database.

            $this->model_setting_setting->editSetting('magikbrezza', $this->request->post);
     
            // To display the success text on data save
            $this->session->data['success'] = $this->language->get('text_success');
     
            // Redirect to the Module Listing           
            $this->response->redirect($this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true));
        }
     
        // Assign the language data for parsing it to view
        $data['heading_title'] = $this->language->get('heading_title');
     
        $data['text_edit']    = $this->language->get('text_edit');
        $data['text_yes']    = $this->language->get('text_yes');
        $data['text_no']    = $this->language->get('text_no');
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');
        $data['text_content_top'] = $this->language->get('text_content_top');
        $data['text_content_bottom'] = $this->language->get('text_content_bottom');      
        $data['text_column_left'] = $this->language->get('text_column_left');
        $data['text_column_right'] = $this->language->get('text_column_right');
     
        $data['entry_code'] = $this->language->get('entry_code');
        $data['entry_layout'] = $this->language->get('entry_layout');
        $data['entry_position'] = $this->language->get('entry_position');
        $data['entry_status'] = $this->language->get('entry_status');
        $data['entry_sort_order'] = $this->language->get('entry_sort_order');
     
        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');
        $data['button_add_module'] = $this->language->get('button_add_module');
        $data['button_remove'] = $this->language->get('button_remove');
         
        // This Block returns the warning if any
        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }
     
        // This Block returns the error code if any
        if (isset($this->error['code'])) {
            $data['error_code'] = $this->error['code'];
        } else {
            $data['error_code'] = '';
        }     
     
        // Making of Breadcrumbs to be displayed on site
        $data['breadcrumbs'] = array();
        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], true),
            'separator' => false
        );
        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true)
        );
        
        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/module/magikbrezza', 'token=' . $this->session->data['token'], true)
        );           
                
        $data['action'] = $this->url->link('extension/module/magikbrezza', 'token=' . $this->session->data['token'], true);

        // URL to be redirected when cancel button is pressed
        $data['cancel'] = $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true);      

        // This block checks, if the hello world text field is set it parses it to view otherwise get the default 
        // hello world text field from the database and parse it
        
        $config_data = array(
        
        'magikbrezza_address',
        'magikbrezza_phone',
        'magikbrezza_email',
        'magikbrezza_fb',
        'magikbrezza_twitter',
        'magikbrezza_gglplus',
        'magikbrezza_rss',
        'magikbrezza_pinterest',
        'magikbrezza_linkedin',
        'magikbrezza_youtube',
        'magikbrezza_powerby',
        'magikbrezza_home_option',
        'magikbrezza_quickview_button',
        'magikbrezza_scroll_totop',
        'magikbrezza_sale_label',
        'magikbrezza_sale_labeltitle',
        'magikbrezza_sale_labelcolor',
        'magikbrezza_menubar_cb',
        'magikbrezza_menubar_cbtitle',
        'magikbrezza_menubar_cbcontent',
        'magikbrezza_vmenubar_cb',
        'magikbrezza_vmenubar_cbtitle',
        'magikbrezza_vmenubar_cbcontent',
        'magikbrezza_product_ct',
        'magikbrezza_product_cttitle',
        'magikbrezza_product_ctcontent',
        'magikbrezza_product_ct2',
        'magikbrezza_product_ct2title',
        'magikbrezza_product_ct2content',
        'magikbrezza_newsletter',
        'magikbrezza_newslettercontent',
        'magikbrezza_footer_cb',
        'magikbrezza_footer_cbcontent',
        'magikbrezza_body_bg',
        'magikbrezza_body_bg_ed',
        'magikbrezza_fontcolor',
        'magikbrezza_fontcolor_ed',
        'magikbrezza_linkcolor',
        'magikbrezza_linkcolor_ed',
        'magikbrezza_linkhovercolor',
        'magikbrezza_linkhovercolor_ed',
        'magikbrezza_headerbg',
        'magikbrezza_headerbg_ed',
        'magikbrezza_headerlinkcolor',
        'magikbrezza_headerlinkcolor_ed',
        'magikbrezza_headerlinkhovercolor',
        'magikbrezza_headerlinkhovercolor_ed',
        'magikbrezza_headerclcolor',
        'magikbrezza_headerclcolor_ed',
        'magikbrezza_mmbgcolor',
        'magikbrezza_mmbgcolor_ed',
        'magikbrezza_mmlinkscolor',
        'magikbrezza_mmlinkscolor_ed',
        'magikbrezza_mmlinkshovercolor',
        'magikbrezza_mmlinkshovercolor_ed',
        'magikbrezza_mmslinkscolor',
        'magikbrezza_mmslinkscolor_ed',
        'magikbrezza_mmslinkshovercolor',
        'magikbrezza_mmslinkshovercolor_ed',
        'magikbrezza_buttoncolor',
        'magikbrezza_buttoncolor_ed',
        'magikbrezza_buttonhovercolor',
        'magikbrezza_buttonhovercolor_ed',
        'magikbrezza_pricecolor',
        'magikbrezza_pricecolor_ed',
        'magikbrezza_oldpricecolor',
        'magikbrezza_oldpricecolor_ed',
        'magikbrezza_newpricecolor',
        'magikbrezza_newpricecolor_ed',
        'magikbrezza_footerbg',
        'magikbrezza_footerbg_ed',
        'magikbrezza_footerlinkcolor',
        'magikbrezza_footerlinkcolor_ed',
        'magikbrezza_footerlinkhovercolor',
        'magikbrezza_footerlinkhovercolor_ed',
        'magikbrezza_powerbycolor',
        'magikbrezza_powerbycolor_ed',
        'magikbrezza_fonttransform',
        'magikbrezza_productpage_cb',
        'magikbrezza_productpage_cbcontent',
        'magikbrezza_productpage_related_cb',
        'magikbrezza_productpage_related_cbcontent',       
        'magikbrezza_headercb_ed',
        'magikbrezza_headercb_content',
        'magikbrezza_footer_fb',
        'magikbrezza_footer_fbcontent',
        'magikbrezza_animation_effect'
        );

        foreach ($config_data as $conf) {
            if (isset($this->request->post[$conf])) {
                $data[$conf] = $this->request->post[$conf];
                
            } else {
                $data[$conf] = $this->config->get($conf);

            }
        } 

 
   
        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/module/magikbrezza', $data));

    }

    /* Function that validates the data when Save Button is pressed */
    protected function validate() {
 
        // Block to check the user permission to manipulate the module
        if (!$this->user->hasPermission('modify', 'extension/module/magikbrezza')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }
 
        /* End Block*/
 
        // Block returns true if no error is found, else false if any error detected
        if (!$this->error) {
            return true;
        } else {
            return false;
        }
    }
}