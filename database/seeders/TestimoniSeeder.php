<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\testimoni_feedback;

class TestimoniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        testimoni_feedback::create([
            'id_user' => '1',
            'testimoni' => 'PDT di STIS memberikan pengalaman luar biasa. Materi yang mendalam, 
                            pendekatan interaktif, dan pembicara profesional menciptakan 
                            fondasi kokoh untuk pengembangan pribadi dan profesional saya. 
                            Terima kasih STIS, PDT memberikan wawasan berharga.',
            'feedback' => 'PDT STIS memberikan pengalaman pelatihan yang sangat bermanfaat. 
                            Saya mengapresiasi pendekatan interaktif dalam menyajikan materi 
                            yang membuat pembelajaran lebih menarik. Fasilitator berkompeten 
                            dan ramah, memberikan jawaban yang memadai terhadap pertanyaan 
                            peserta.',
            'status' => '1'
        ]);

        testimoni_feedback::create([
            'id_user' => '1',
            'testimoni' => 'STIS membawa PDT ke tingkat baru. Sesuai dengan harapan saya, kegiatan ini 
                            memberikan wawasan mendalam tentang kepemimpinan, komunikasi efektif, dan pengembangan 
                            karier. Sesi praktis dan studi kasus benar-benar mendorong saya untuk mengaplikasikan 
                            konsep-konsep tersebut secara nyata.',
            'feedback' => 'Saya merasa puas dengan PDT di STIS. Materi pelatihan sangat relevan dan aplikatif 
                            dalam konteks pekerjaan sehari-hari. Sesi diskusi kelompok memberikan peluang 
                            untuk berbagi pengalaman dan belajar dari rekan-rekan sejawat. Penekanan pada 
                            aspek kesejahteraan mental dan emosional juga memberikan nilai tambah yang 
                            signifikan.',
            'status' => '1'
        ]);

        testimoni_feedback::create([
            'id_user' => '1',
            'testimoni' => 'PDT STIS adalah perjalanan belajar yang mengubah hidup. Materi yang merangsang 
                            pemikiran kritis, kolaborasi yang membangun jaringan, dan pendekatan holistik terhadap 
                            kesejahteraan membuat saya lebih siap dan termotivasi untuk mencapai tujuan pribadi 
                            dan profesional saya.',
            'feedback' => 'PDT STIS memberikan pengalaman pelatihan yang sangat bermanfaat. Saya mengapresiasi 
                            pendekatan interaktif dalam menyajikan materi yang membuat pembelajaran lebih menarik. Fasilitator 
                            berkompeten dan ramah, memberikan jawaban yang memadai terhadap pertanyaan peserta.',
            'status' => '1'
        ]);
    }
}
