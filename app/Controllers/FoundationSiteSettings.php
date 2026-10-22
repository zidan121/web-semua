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
        // Muat nilai lama sebelum memproses POST agar kolom gambar yang tidak diunggah
        // tidak terhapus dan setiap pengaturan yang tidak berubah tetap dipertahankan.
        $settings=[];
        foreach($db->table('foundation_site_settings')->get()->getResultArray() as $row){
            $settings[$row['setting_key']]=$row['setting_value'];
        }
        if($this->request->is('post')){
            $fields=['site_name','tagline','hero_title','hero_description','hero_image_url','profile_title','profile_text','profile_image_url','value_one','value_two','value_three','address','phone','whatsapp','email','maps_url','footer_text'];
            $checks=['show_stats','show_profile','show_units','show_news','show_contact','show_map']; $values=[];
            foreach($fields as $key){$value=trim((string)$this->request->getPost($key));if($key==='maps_url'&&$value!==''&&!filter_var($value,FILTER_VALIDATE_URL))return redirect()->back()->withInput()->with('error','URL peta harus valid.');$values[$key]=$value;}
            foreach(['logo_path'=>'logo_file','hero_image_url'=>'hero_image_file','profile_image_url'=>'profile_image_file'] as $setting=>$inputName){
                $file=$this->request->getFile($inputName);
                if($file && $file->isValid() && !$file->hasMoved()){
                    if(!in_array($file->getMimeType(),['image/jpeg','image/png','image/webp','image/gif'],true))return redirect()->back()->withInput()->with('error','Gunakan gambar JPG, PNG, WEBP, atau GIF.');
                    if($file->getSizeByUnit('mb')>5)return redirect()->back()->withInput()->with('error','Ukuran gambar maksimal 5 MB.');
                    $folder=FCPATH.'uploads/foundation';
                    if(!is_dir($folder)&&!mkdir($folder,0755,true)&&!is_dir($folder))return redirect()->back()->withInput()->with('error','Folder upload gagal dibuat.');
                    $name=$file->getRandomName();
                    if(!$file->move($folder,$name))return redirect()->back()->withInput()->with('error','Gagal menyimpan gambar.');
                    $values[$setting]='uploads/foundation/'.$name;
                } elseif($setting==='logo_path') {
                    $values[$setting]=$settings[$setting]??'';
                } elseif(in_array($setting,['hero_image_url','profile_image_url'],true) && ($values[$setting]??'')==='') {
                    $values[$setting]=$settings[$setting]??'';
                }
                if($this->request->getPost('remove_'.$setting)==='1')$values[$setting]='';
            }
            foreach($checks as $key)$values[$key]=$this->request->getPost($key)==='1'?'1':'0';
            $now=date('Y-m-d H:i:s');
            foreach($values as $key=>$value){$exists=$db->table('foundation_site_settings')->where('setting_key',$key)->get()->getRowArray();if($exists)$db->table('foundation_site_settings')->where('setting_key',$key)->update(['setting_value'=>$value,'updated_at'=>$now]);else$db->table('foundation_site_settings')->insert(['setting_key'=>$key,'setting_value'=>$value,'created_at'=>$now,'updated_at'=>$now]);}
            return redirect()->to(site_url('admin/yayasan/tampilan'))->with('success','Pengaturan website berhasil disimpan.');
        }
        return view('foundation_admin/site_settings',['settings'=>$settings,'success'=>session()->getFlashdata('success'),'error'=>session()->getFlashdata('error')]);
    }
}