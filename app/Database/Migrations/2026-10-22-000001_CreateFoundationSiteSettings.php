<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class CreateFoundationSiteSettings extends Migration
{
 public function up(){
  $this->forge->addField(['id'=>['type'=>'INT','constraint'=>10,'unsigned'=>true,'auto_increment'=>true],'setting_key'=>['type'=>'VARCHAR','constraint'=>100],'setting_value'=>['type'=>'TEXT','null'=>true],'created_at'=>['type'=>'DATETIME','null'=>true],'updated_at'=>['type'=>'DATETIME','null'=>true]]);
  $this->forge->addKey('id',true);$this->forge->addUniqueKey('setting_key');$this->forge->createTable('foundation_site_settings',true);
  $defaults=['site_name'=>'Yayasan Bina Insani Grobogan','tagline'=>'Pendidikan Islam untuk Generasi Qur’ani','hero_title'=>'Yayasan Bina Insani Grobogan','hero_description'=>'Membina generasi berilmu, berakhlak, dan mandiri melalui pendidikan Islam yang berkualitas dan berkelanjutan.','hero_image_url'=>'','profile_title'=>'Yayasan Bina Insani Grobogan','profile_text'=>'Yayasan Bina Insani Grobogan adalah lembaga pendidikan Islam yang berkomitmen menyelenggarakan pendidikan berkualitas untuk membangun generasi Qur’ani, berilmu, berakhlak mulia, dan siap menghadapi tantangan masa depan.','profile_image_url'=>'','value_one'=>'Berlandaskan Nilai Islam','value_two'=>'Pendidikan Berkualitas','value_three'=>'Membangun Generasi Unggul','address'=>'Grobogan, Jawa Tengah','phone'=>'','whatsapp'=>'','email'=>'','maps_url'=>'https://www.google.com/maps/search/?api=1&query=Yayasan+Bina+Insani+Grobogan','footer_text'=>'Pendidikan Islam untuk Generasi Qur’ani','show_stats'=>'1','show_profile'=>'1','show_units'=>'1','show_news'=>'1','show_contact'=>'1','show_map'=>'1'];
  foreach($defaults as $key=>$value)$this->db->table('foundation_site_settings')->insert(['setting_key'=>$key,'setting_value'=>$value,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]);
 }
 public function down(){$this->forge->dropTable('foundation_site_settings',true);}
}