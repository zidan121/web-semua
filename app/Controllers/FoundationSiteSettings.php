<?php
namespace App\Controllers;
use CodeIgniter\Controller;
class FoundationSiteSettings extends Controller
{
    private function guard(): void {
        if (!session()->has('foundation_admin_id')) { redirect()->to(site_url('admin/yayasan/login'))->send(); exit; }
        $ok=db_connect()->table('foundation_users')->where('id',(int)session()->get('foundation_admin_id'))->where('is_active',1)->countAllResults();
        if($ok!==1){session()->remove(['foundation_admin_id','foundation_admin_name']);redirect()->to(site_url('admin/yayasan/login'))->send();exit;}
    }
    public function index() {
        $this->guard(); $db=db_connect();
        if(!$db->tableExists('foundation_site_settings')) return view('foundation_admin/site_settings',['settings'=>[],'error'=>'Tabel pengaturan belum tersedia. Jalankan php spark migrate.']);
        if($this->request->is('post')){
            $fields=['site_name','tagline','hero_title','hero_description','hero_image_url','profile_title','profile_text','profile_image_url','value_one','value_two','value_three','address','phone','whatsapp','email','maps_url','footer_text'];
            $checks=['show_stats','show_profile','show_units','show_news','show_contact','show_map']; $values=[];
            foreach($fields as $key){$value=trim((string)$this->request->getPost($key));if(in_array($key,['hero_image_url','profile_image_url','maps_url'],true)&&$value!==''&&!filter_var($value,FILTER_VALIDATE_URL))return redirect()->back()->withInput()->with('error','URL foto dan peta harus berupa URL valid.');$values[$key]=$value;}
            foreach($checks as $key)$values[$key]=$this->request->getPost($key)==='1'?'1':'0';
            $now=date('Y-m-d H:i:s');
            foreach($values as $key=>$value){$exists=$db->table('foundation_site_settings')->where('setting_key',$key)->get()->getRowArray();if($exists)$db->table('foundation_site_settings')->where('setting_key',$key)->update(['setting_value'=>$value,'updated_at'=>$now]);else$db->table('foundation_site_settings')->insert(['setting_key'=>$key,'setting_value'=>$value,'created_at'=>$now,'updated_at'=>$now]);}
            return redirect()->to(site_url('admin/yayasan/tampilan'))->with('success','Pengaturan website berhasil disimpan.');
        }
        $settings=[];foreach($db->table('foundation_site_settings')->get()->getResultArray() as $row)$settings[$row['setting_key']]=$row['setting_value'];
        return view('foundation_admin/site_settings',['settings'=>$settings,'success'=>session()->getFlashdata('success'),'error'=>session()->getFlashdata('error')]);
    }
}