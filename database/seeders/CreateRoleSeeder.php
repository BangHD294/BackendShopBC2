<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            //  7 cap do khach hang
            ['name' => 'nd1', 'display_name' => 'Người dùng 1'],
            ['name' => 'nd2', 'display_name' => 'Người dùng 2'],
            ['name' => 'nd3', 'display_name' => 'Người dùng 3'],
            ['name' => 'nd4', 'display_name' => 'Người dùng 4'],
            ['name' => 'nd5', 'display_name' => 'Người dùng 5'],
            ['name' => 'nd6', 'display_name' => 'Người dùng 6'],
            ['name' => 'nd7', 'display_name' => 'Người dùng 7'],
            ['name' => 'nd8', 'display_name' => 'Người dùng 8'],
            ['name' => 'nd9', 'display_name' => 'Người dùng 9'],
            ['name' => 'nd10', 'display_name' => 'Người dùng 10'],
            ['name' => 'nd11', 'display_name' => 'Người dùng 11'],
            ['name' => 'nd12', 'display_name' => 'Người dùng 12'],
            ['name' => 'nd13', 'display_name' => 'Người dùng 13'],
//
            ['name' => 'ndtn_sc', 'display_name' => 'Người dùng tiềm năng sơ cấp'],
            ['name' => 'ndtn_tc', 'display_name' => 'Người dùng tiềm năng trung cấp'],
            ['name' => 'ndtn_cc', 'display_name' => 'Người dùng tiềm năng cao cấp'],
//
            ['name' => 'ndtt_sc', 'display_name' => 'Người dùng thân thiết sơ cấp'],
            ['name' => 'ndtt_tc', 'display_name' => 'Người dùng thân thiết trung cấp'],
            ['name' => 'ndtt_cc', 'display_name' => 'Người dùng thân thiết cao cấp'],
//
            ['name' => 'ndrf_sc', 'display_name' => 'Người dùng cuồng nhiệt sơ cấp'],
            ['name' => 'ndrf_tc', 'display_name' => 'Người dùng cuồng nhiệt trung cấp'],
            ['name' => 'ndrf_cc', 'display_name' => 'Người dùng cuồng nhiệt cao cấp'],
//
            ['name' => 'kdnd_sc', 'display_name' => 'Kiểm duyệt nội dung sơ cấp'],
            ['name' => 'kdnd_tc', 'display_name' => 'Kiểm duyệt nội dung trung cấp'],
            ['name' => 'kdnd_cc', 'display_name' => 'Kiểm duyệt nội dung cao cấp'],
//
            ['name' => 'qlnd_sc', 'display_name' => 'Quản lý nội dung sơ cấp'],
            ['name' => 'qlnd_tc', 'display_name' => 'Quản lý nội dung trung cấp'],
            ['name' => 'qlnd_cc', 'display_name' => 'Quản lý nội dung cao cấp'],
//
            ['name' => 'ql_sc', 'display_name' => 'Quản lý sơ cấp'],
            ['name' => 'ql_tc', 'display_name' => 'Quản lý trung cấp'],
            ['name' => 'ql_cc', 'display_name' => 'Quản lý cao cấp'],

            ['name' => 'sangtaoquytac', 'display_name' => 'Người tạo quy tắc'],

        ]);

//        DB::table('roles')->insert([
//        //            luyen lhi
//            ['name' => 'Luyenkhiky1', 'display_name' => 'Luyện khí kỳ 1'],
//            ['name' => 'Luyenkhiky2', 'display_name' => 'Luyện khí kỳ 2'],
//            ['name' => 'Luyenkhiky3', 'display_name' => 'Luyện khí kỳ 3'],
//            ['name' => 'Luyenkhiky4', 'display_name' => 'Luyện khí kỳ 4'],
//            ['name' => 'Luyenkhiky5', 'display_name' => 'Luyện khí kỳ 5'],
//            ['name' => 'Luyenkhiky6', 'display_name' => 'Luyện khí kỳ 6'],
//            ['name' => 'Luyenkhiky7', 'display_name' => 'Luyện khí kỳ 7'],
//            ['name' => 'Luyenkhiky8', 'display_name' => 'Luyện khí kỳ 8'],
//            ['name' => 'Luyenkhiky9', 'display_name' => 'Luyện khí kỳ 9'],
//            ['name' => 'Luyenkhiky10', 'display_name' => 'Luyện khí kỳ 10'],
//            ['name' => 'Luyenkhiky11', 'display_name' => 'Luyện khí kỳ 11'],
//            ['name' => 'Luyenkhiky12', 'display_name' => 'Luyện khí kỳ 12'],
//            ['name' => 'Luyenkhiky13', 'display_name' => 'Luyện khí kỳ 13'],
//            //Truc co ky
//            ['name' => 'truccosoky', 'display_name' => 'Trúc cơ sơ kỳ'],
//            ['name' => 'truccotrungky', 'display_name' => 'Trúc cơ trung kỳ'],
//            ['name' => 'truccohauky', 'display_name' => 'Trúc cơ hậu kỳ'],
//            //ket dan ky
//            ['name' => 'ketdansoky', 'display_name' => 'Kết đan sơ kỳ'],
//            ['name' => 'ketdantrungky', 'display_name' => 'Kết đan trung kỳ'],
//            ['name' => 'ketdanhauky', 'display_name' => 'Kết đan hậu kỳ'],
//            // nguyen anh ky
//            ['name' => 'nguyenanhsoky', 'display_name' => 'Nguyên anh sơ kỳ'],
//            ['name' => 'nguyenanhtrungky', 'display_name' => 'Nguyên anh trung kỳ'],
//            ['name' => 'nguyenanhhauky', 'display_name' => 'Nguyên anh hậu kỳ'],
//            //hoa than ky
//            ['name' => 'hoathansoky', 'display_name' => 'Hóa thần sơ kỳ'],
//            ['name' => 'hoathantrungky', 'display_name' => 'Hóa thần trung kỳ'],
//            ['name' => 'hoathanhauky', 'display_name' => 'Hóa thần hậu kỳ'],
//            //luyen hu ky
//            ['name' => 'luyenhusoky', 'display_name' => 'Luyện hư sơ kỳ'],
//            ['name' => 'luyenhutrungky', 'display_name' => 'Luyện hư trung kỳ'],
//            ['name' => 'luyenhuhauky', 'display_name' => 'Luyện hư hậu kỳ'],
//            //hop the ky
//            ['name' => 'hopthesoky', 'display_name' => 'Hợp thể sơ kỳ'],
//            ['name' => 'hopthetrungky', 'display_name' => 'Hợp thể trung kỳ'],
//            ['name' => 'hopthehauky', 'display_name' => 'Hợp thể hậu kỳ'],
//            //dai thua ky
//            ['name' => 'daithuasoky', 'display_name' => 'Đại thừa sơ kỳ'],
//            ['name' => 'daithuatrungky', 'display_name' => 'Đại thừa trung kỳ'],
//            ['name' => 'daithuahauky', 'display_name' => 'Đại thừa hậu kỳ'],
//            //nguy tien
//            ['name' => 'nguytiensoky', 'display_name' => 'Ngụy tiên sơ kỳ'],
//            ['name' => 'nguytientrungky', 'display_name' => 'Ngụy tiên trung kỳ'],
//            ['name' => 'nguytienhauky', 'display_name' => 'Ngụy tiên hậu kỳ'],
//            //tan tien
//            ['name' => 'tantiensoky', 'display_name' => 'Tán tiên sơ kỳ'],
//            ['name' => 'tantientrungky', 'display_name' => 'Tán tiên trung kỳ'],
//            ['name' => 'tantienhauky', 'display_name' => 'Tán tiên hậu kỳ'],
//            //huyen tien
//            ['name' => 'huyentiensoky', 'display_name' => 'Huyền tiên sơ kỳ'],
//            ['name' => 'huyentientrungky', 'display_name' => 'Huyền tiên trung kỳ'],
//            ['name' => 'huyentienhauky', 'display_name' => 'Huyền tiên hậu kỳ'],
//            //dia tien
//            ['name' => 'diatiensoky', 'display_name' => 'Địa tiên sơ kỳ'],
//            ['name' => 'diatientrungky', 'display_name' => 'Địa tiên trung kỳ'],
//            ['name' => 'diatienhauky', 'display_name' => 'Địa tiên hậu kỳ'],
//            //chan tien
//            ['name' => 'chantiensoky', 'display_name' => 'Chân tiên sơ kỳ'],
//            ['name' => 'chantientrungky', 'display_name' => 'Chân tiên trung kỳ'],
//            ['name' => 'chantienhauky', 'display_name' => 'Chân tiên hậu kỳ'],
//            //kim tien
//            ['name' => 'kimtiensoky', 'display_name' => 'Kim tiên sơ kỳ'],
//            ['name' => 'kimtientrungky', 'display_name' => 'Kim tiên trung kỳ'],
//            ['name' => 'kimtienhauky', 'display_name' => 'Kim tiên hậu kỳ'],
//            //thai at ngoc tien
//            ['name' => 'thaiatsoky', 'display_name' => 'Thái ất sơ kỳ'],
//            ['name' => 'thaiattrungky', 'display_name' => 'Chân tiên trung kỳ'],
//            ['name' => 'thaiathauky', 'display_name' => 'Chân tiên hậu kỳ'],
//            //Dai la kim tien
//            ['name' => 'dailasoky', 'display_name' => 'Đại la sơ kỳ'],
//            ['name' => 'dailatrungky', 'display_name' => 'Đại la trung kỳ'],
//            ['name' => 'dailahauky', 'display_name' => 'Đại la hậu kỳ'],
//            //Dao to
//            ['name' => 'daoto', 'display_name' => 'Đạo tổ sơ kỳ'],
//
//        ]);
    }
}
