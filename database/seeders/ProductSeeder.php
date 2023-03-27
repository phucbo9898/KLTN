<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'id' => 1,
                'name' => 'CPU AMD Ryzen 5 5600',
                'slug' => Str::slug('CPU AMD Ryzen 5 5600 (3.5 GHz Upto 4.4GHz / 35MB / 6 Cores, 12 Threads / 65W / Socket AM4)'),
                'name_full' => 'CPU AMD Ryzen 5 5600 (3.5 GHz Upto 4.4GHz / 35MB / 6 Cores, 12 Threads / 65W / Socket AM4)',
                'category_id' => 1,
                'price' => 5499000,
                'sale' => 30,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h3>Th&ocirc;ng số kỹ thuật chi tiết CPU AMD Ryzen 5 5600 (3.5 GHz Upto 4.4GHz / 35MB / 6 Cores, 12 Threads / 65W / Socket AM4)</h3>
                    <table style="width:688px">
                        <tbody>
                            <tr>
                                <td>Thương hiệu</td>
                                <td>AMD Ryzen&trade; Processors</td>
                            </tr>
                            <tr>
                                <td>Loại CPU</td>
                                <td>D&agrave;nh cho m&aacute;y b&agrave;n</td>
                            </tr>
                            <tr>
                                <td>Thế hệ&nbsp;</td>
                                <td>AMD Ryzen 5</td>
                            </tr>
                            <tr>
                                <td>T&ecirc;n gọi</td>
                                <td>Ryzen 5 5600</td>
                            </tr>
                            <tr>
                                <td colspan="2">CHI TIẾT</td>
                            </tr>
                            <tr>
                                <td>Socket</td>
                                <td>AM4</td>
                            </tr>
                            <tr>
                                <td>Số nh&acirc;n</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <td>Số luồng</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td rowspan="2">Tốc độ cơ bản</td>
                                <td>3.5GHz</td>
                            </tr>
                            <tr>
                                <td>Up to 4.4GHz</td>
                            </tr>
                            <tr>
                                <td>Cache</td>
                                <td>
                                <p>L1 Cache: 384KB</p>

                                <p>L2 Cache: 3MB</p>

                                <p>L3 Cache : 32MB</p>
                                </td>
                            </tr>
                            <tr>
                                <td>Hỗ trợ 64-bit</td>
                                <td>C&oacute;</td>
                            </tr>
                            <tr>
                                <td>Hỗ trợ bộ nhớ</td>
                                <td>
                                <p>2x1R: DDR4-3200</p>

                                <p>2x2R: DDR4-3200</p>

                                <p>4x1R: DDR4-2933</p>

                                <p>4x2R: DDR4-2667</p>
                                </td>
                            </tr>
                            <tr>
                                <td>Hỗ trợ số k&ecirc;nh bộ nhớ</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>Hỗ trợ c&ocirc;ng nghệ ảo h&oacute;a</td>
                                <td>C&oacute;</td>
                            </tr>
                            <tr>
                                <td>Phi&ecirc;n bản PCI Express</td>
                                <td>4.0</td>
                            </tr>
                            <tr>
                                <td>TDP</td>
                                <td>65W</td>
                            </tr>
                            <tr>
                                <td>Tản nhiệt</td>
                                <td>Mặc định đi k&egrave;m</td>
                            </tr>
                            <tr>
                                <td>Bảo h&agrave;nh&nbsp;</td>
                                <td>36 Th&aacute;ng</td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <h2>Đ&aacute;nh gi&aacute; CPU AMD Ryzen 5 5600 (3.5 GHz Upto 4.4GHz / 35MB / 6 Cores, 12 Threads / 65W / Socket AM4)</h2>

                    <p><strong>CPU AMD Ryzen 5 5600&nbsp;</strong>l&agrave; 1 trong những CPU mới nhất của Series Ryzen 5000 của AMD. CPU vẫn sử dụng Socket AM4 v&agrave; c&oacute; 6 nh&acirc;n 12 luồng c&ugrave;ng xung nhịp tối đa 4.4Ghz.&nbsp;</p>

                    <h3>Kiến tr&uacute;c Zen 3</h3>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fzen-3-amd.jpg?alt=media&token=8b57e743-2cd3-46fd-87d7-ed202c258ea1" width="1260" />
                    <figcaption></figcaption>
                    </figure>

                    <p>CPU&nbsp;Ryzen 5000 Series sở hữu kiến tr&uacute;c Zen 3 với nhiều thay đổi mang lại hiệu năng rất cao so với thế hệ cũ. Mỗi CCX giờ đ&acirc;y sẽ c&oacute; 8 nh&acirc;n/CCX, thay v&igrave; 4 nh&acirc;n/CCX như Zen 2. C&aacute;c CCX c&oacute; thể chạy tr&ecirc;n chế độ Single Thread hoặc Two Thread SMT, cho tối đa 16 luồng/CCX. Từ đ&oacute; sẽ cho ra tối đa 16 nh&acirc;n/32 luồng. Mỗi CCD giờ đ&acirc;y sẽ chỉ chứa 1 CCX, thay v&igrave; 2 như thế hệ tiền nhiệm.</p>

                    <p>Mỗi nh&acirc;n Zen 3 tr&ecirc;n Ryzen 5000 sẽ c&oacute; 512kB Cache L2. Từ đ&oacute; c&oacute; 4MB cache L2/CCD v&agrave; nếu CPU c&oacute; 2 CCD th&igrave; tổng lượng cache L2 sẽ l&agrave; 8MB. Đi c&ugrave;ng với đ&oacute;, mỗi CCD sẽ c&oacute; th&ecirc;m 32MB cache L3 v&agrave; sẽ hợp nhất lại th&agrave;nh 1, thay v&igrave; chia l&agrave;m đ&ocirc;i như thế hệ trước.&nbsp;</p>

                    <p>Tất cả những cải tiến đ&oacute; cho ph&eacute;p:&nbsp;</p>

                    <ul>
                        <li>Xung boost cao hơn</li>
                        <li>IPC tăng l&ecirc;n tới 19%</li>
                        <li>Giảm thiểu đ&aacute;ng kể độ trễ bộ nhớ</li>
                        <li>Tăng tốc giao tiếp giữa nh&acirc;n v&agrave; cache</li>
                    </ul>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2F65333_cpu_amryzen_5_5600.jpg?alt=media&token=4345b775-b203-4333-ac01-22136732448c',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'name' => 'CPU AMD Ryzen 7 5800X',
                'slug' => Str::slug('CPU AMD Ryzen 75800X (3.8 GHz Upto 4.7GHz / 36MB / 8 Cores, 16 Threads / 105W / Socket AM4)'),
                'name_full' => 'CPU AMD Ryzen 7 5800X (3.8 GHz Upto 4.7GHz / 36MB / 8 Cores, 16 Threads / 105W / Socket AM4)',
                'category_id' => 1,
                'price' => 10799000,
                'sale' => 30,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2>Th&ocirc;ng số kỹ thuật</h2>
                    <table style="width:523px">
                        <tbody>
                            <tr>
                                <td>
                                <p>T&ecirc;n gọi</p>
                                </td>
                                <td>
                                <p>AMD Ryzen 7 5800X</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>H&atilde;ng sản xuất</p>
                                </td>
                                <td>
                                <p>AMD</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số nh&acirc;n</p>
                                </td>
                                <td>
                                <p>8</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số luồng</p>
                                </td>
                                <td>
                                <p>16</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tốc độ cơ bản</p>
                                </td>
                                <td>
                                <p>3.8GHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tốc độ tối đa (Max Boost)</p>
                                </td>
                                <td>
                                <p>4.8GHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Bộ nhớ đệm</p>
                                </td>
                                <td>
                                <p>4MB (L2) + 32MB (L3)</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ mở kh&oacute;a hệ số nh&acirc;n</p>
                                </td>
                                <td>
                                <p>C&oacute;</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Socket</p>
                                </td>
                                <td>
                                <p>AM4</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Phi&ecirc;n bản PCI Express</p>
                                </td>
                                <td>
                                <p>4.0</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>TDP mặc định</p>
                                </td>
                                <td>
                                <p>105W</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Loại RAM hỗ trợ</p>
                                </td>
                                <td>
                                <p>DDR4 3200MHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tiến tr&igrave;nh sản xuất</p>
                                </td>
                                <td>
                                <p>TSMC 7nm</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <h2>Đ&aacute;nh gi&aacute; CPU AMD&nbsp;Ryzen 7 5800X Ch&iacute;nh H&atilde;ng | Sức Mạnh Gaming Tuyệt Đối</h2>

                    <p><strong><a href="https://www.hacom.vn/cpu-amd-ryzen-7-5800x">CPU AMD Ryzen 7 5800X</a></strong>&nbsp;&nbsp;l&agrave; 1 trong những CPU đầu bảng Series Ryzen 5000 của AMD. CPU vẫn sử dụng Socket AM4 v&agrave; c&oacute; 8 nh&acirc;n 16 luồng c&ugrave;ng xung nhịp tối đa 4.7Ghz.&nbsp;</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcpu-amd-ryzen-7-5800x-mota2.jpg?alt=media&token=03712420-808f-4f91-a04c-153f627aae82" width="970" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Kiến tr&uacute;c Zen 3</strong></h3>

                    <p>Ryzen 5000 Series sở hữu kiến tr&uacute;c Zen 3 với nhiều thay đổi mang lại hiệu năng rất cao so với thế hệ cũ. Mỗi CCX giờ đ&acirc;y sẽ c&oacute; 8 nh&acirc;n/CCX, thay v&igrave; 4 nh&acirc;n/CCX như Zen 2. C&aacute;c CCX c&oacute; thể chạy tr&ecirc;n chế độ Single Thread hoặc Two Thread SMT, cho tối đa 16 luồng/CCX. Từ đ&oacute; sẽ cho ra tối đa 16 nh&acirc;n/32 luồng. Mỗi CCD giờ đ&acirc;y sẽ chỉ chứa 1 CCX, thay v&igrave; 2 như thế hệ tiền nhiệm.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcpu-amd-ryzen-7-5800x-mota3.jpg?alt=media&token=e1d0cfad-ef0d-4217-bdbe-d5da3dc16dc6" width="970" />
                    <figcaption></figcaption>
                    </figure>

                    <p>Mỗi nh&acirc;n Zen 3 tr&ecirc;n Ryzen 5000 sẽ c&oacute; 512kB Cache L2. Từ đ&oacute; c&oacute; 4MB cache L2/CCD v&agrave; nếu CPU c&oacute; 2 CCD th&igrave; tổng lượng cache L2 sẽ l&agrave; 8MB. Đi c&ugrave;ng với đ&oacute;, mỗi CCD sẽ c&oacute; th&ecirc;m 32MB cache L3 v&agrave; sẽ hợp nhất lại th&agrave;nh 1, thay v&igrave; chia l&agrave;m đ&ocirc;i như thế hệ trước.&nbsp;</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcpu-amd-ryzen-7-5800x-mota1.jpg?alt=media&token=8359f2c3-7449-4dbe-8a7a-33b9477f8d23" width="970" />
                    <figcaption></figcaption>
                    </figure>

                    <p>Tất cả những cải tiến đ&oacute; cho ph&eacute;p:&nbsp;</p>

                    <ul>
                        <li>Xung boost cao hơn</li>
                        <li>IPC tăng l&ecirc;n tới 19%</li>
                        <li>Giảm thiểu đ&aacute;ng kể độ trễ bộ nhớ</li>
                        <li>Tăng tốc giao tiếp giữa nh&acirc;n v&agrave; cache</li>
                        <li>Sức mạnh của Ryzen 7 - 5800X</li>
                    </ul>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcpuamdryzen75800x.png?alt=media&token=72f1078f-b2ba-4ddc-a68c-1663c1703f9b" width="740" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>AMD Ryzen 7 5800X: Thay đổi để vươn l&ecirc;n</strong></h3>

                    <p>Những thay đổi cơ bản m&agrave; người d&ugrave;ng c&oacute; thể thấy được ở sản phẩm n&agrave;y ch&iacute;nh l&agrave; xung nhịp đ&atilde; được cải thiện l&ecirc;n cụ thể l&agrave; 3.8 GHz v&agrave; turbo l&ecirc;n 4.7 GHz, c&ograve;n lại ch&uacute;ng ta vẫn sẽ c&oacute; 8 nh&acirc;n v&agrave; 16 luồng cũng như hỗ trợ Socket AM4 tương th&iacute;ch với bo mạch chủ cũ như X570, B550 v&agrave; sắp tới c&oacute; thể l&agrave; B450 nữa. Sự gần gũi trong việc n&acirc;ng cấp kh&ocirc;ng cần thay bo mạch chủ ấy khiến AMD Ryzen được sự thiện cảm với người d&ugrave;ng.</p>

                    <p>Nhưng đ&oacute; chưa phải thay đổi nổi bật m&agrave; chỉ khi trải nghiệm ch&uacute;ng ta mới cảm nhận được, đ&oacute; l&agrave; việc giữ xung nhịp all core tốt hơn, xung nhịp đơn nh&acirc;n đ&atilde; được cải thiện đ&aacute;ng kể gi&uacute;p trải nghiệm l&agrave;m việc tr&ecirc;n c&aacute;c phần mềm như Adobe, 3D Max,... được cải thiện đ&aacute;ng kể. Chưa hết, sự thống trị trong ph&acirc;n kh&uacute;c gaming của Intel cũng đ&atilde; bị lung lay khi c&aacute;c kết quả cho thấy CPU AMD đều nh&igrave;nh hơn Intel. Một sự cải tiến c&oacute; thể n&oacute;i l&agrave; ho&agrave;n hảo vốn trước kia l&agrave; thứ khiến người d&ugrave;ng đắn đo khi chọn mua CPU Ryzen của AMD.</p>

                    <p>AMD Ryzen 7 5800X ch&iacute;nh l&agrave; lựa chọn ho&agrave;n hảo kh&ocirc;ng chỉ l&agrave;m việc m&agrave; c&ograve;n giải tr&iacute;, một bước tiến cho đội đỏ v&agrave; cũng l&agrave; sản phẩm đ&aacute;ng để người d&ugrave;ng quan t&acirc;m, sở hữu.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F56283_cpu_amd_ryzen_7_5800x_44.jpg?alt=media&token=2b261641-9ba2-412f-8411-a272802464fc" width="2048" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>AMD StoreMI</strong></h3>

                    <p>C&ocirc;ng nghệ AMD StoreMI đ&atilde; được x&acirc;y dựng lại từ đầu với một thuật to&aacute;n mới gi&uacute;p sử dụng an to&agrave;n v&agrave; đơn giản. Giờ đ&acirc;y, cấu h&igrave;nh StoreMI chỉ đơn giản l&agrave; phản chiếu c&aacute;c tệp được sử dụng nhiều nhất của bạn v&agrave;o ổ SSD m&agrave; bạn chọn, giữ nguy&ecirc;n bản sao gốc. Phần mềm chuyển hướng liền mạch Windows&reg; v&agrave; c&aacute;c ứng dụng của bạn để sử dụng bản sao được phản chiếu nhanh hơn. Việc x&oacute;a hoặc tắt bộ nhớ cache SSD sẽ để lại tất cả c&aacute;c tệp của bạn tr&ecirc;n ổ cứng, ngay tại nơi ch&uacute;ng bắt đầu.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcpu-amd-ryzen-7-5800x-ami.jpg?alt=media&token=e893e54e-3fed-4b70-bbbe-5b21520de17f" width="750" />
                    <figcaption></figcaption>
                    </figure>

                    <p>Nếu bạn c&oacute; bo mạch chủ AMD X570, B550, 400 Series, X399 hoặc TRX40, bạn c&oacute; thể tải xuống AMD StoreMI miễn ph&iacute;.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F56283_cpu_amd_ryzen_7_5800x_33.jpg?alt=media&token=1d57436b-31e2-436d-95b2-c4092fa176eb" width="2048" />
                    <figcaption></figcaption>
                    </figure>

                    <p>&nbsp;</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Famd_5800x.jpg?alt=media&token=246d740c-e9ad-4e59-905d-56781a424e5a',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'name' => 'CPU AMD Ryzen 5 3500',
                'slug' => Str::slug('CPU AMD Ryzen 5 3500 (3.6GHz turbo up to 4.1GHz, 6 nhân 6 luồng, 16MB Cache, 65W) - Socket AMD AM4'),
                'name_full' => 'CPU AMD Ryzen 5 3500 (3.6GHz turbo up to 4.1GHz, 6 nhân 6 luồng, 16MB Cache, 65W) - Socket AMD AM4',
                'category_id' => 1,
                'price' => 3999000,
                'sale' => 15,
                'status' => 'active',
                'hot' => 'no',
                'content' => '',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Famd_5800x.jpg?alt=media&token=246d740c-e9ad-4e59-905d-56781a424e5a',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'name' => 'CPU AMD Athlon 3000G',
                'slug' => Str::slug('CPU AMD Athlon 3000G (3.5GHz, 2 nhân 4 luồng , 5MB Cache, 35W) - Socket AMD AM4'),
                'name_full' => 'CPU AMD Athlon 3000G (3.5GHz, 2 nhân 4 luồng , 5MB Cache, 35W) - Socket AMD AM4',
                'category_id' => 1,
                'price' => 10799000,
                'sale' => 30,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h3>Th&ocirc;ng số kỹ thuật chi tiết CPU AMD&nbsp;Ryzen 5 3500 (3.6GHz turbo up to 4.1GHz, 6 nh&acirc;n 6 luồng, 16MB Cache, 65W) - Socket AMD AM4</h3>
                    <table>
                        <tbody>
                            <tr>
                                <td colspan="2">
                                <p>TH&Ocirc;NG SỐ CƠ BẢN</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Thương hiệu</p>
                                </td>
                                <td>
                                <p>AMD</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Loại CPU</p>
                                </td>
                                <td>
                                <p>D&agrave;nh cho m&aacute;y b&agrave;n</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Thế hệ</p>
                                </td>
                                <td>
                                <p>Ryzen 5 Thế hệ thứ 3</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>T&ecirc;n gọi</p>
                                </td>
                                <td>
                                <p>Ryzen 5-3500</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <p>CHI TIẾT</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Socket</p>
                                </td>
                                <td>
                                <p>AM4</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số nh&acirc;n</p>
                                </td>
                                <td>
                                <p>6</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số luồng</p>
                                </td>
                                <td>
                                <p>6</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tốc độ cơ bản</p>
                                </td>
                                <td>
                                <p>3.6 GHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tốc độ tối đa</p>
                                </td>
                                <td>
                                <p>4.1 GHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Cache</p>
                                </td>
                                <td>
                                <p>19MB</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tiến tr&igrave;nh sản xuất</p>
                                </td>
                                <td>
                                <p>7nm</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ bộ nhớ</p>
                                </td>
                                <td>
                                <p>DDR4 3200</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ số k&ecirc;nh bộ nhớ</p>
                                </td>
                                <td>
                                <p>2</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Phi&ecirc;n bản PCI Express</p>
                                </td>
                                <td>
                                <p>3</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>TDP</p>
                                </td>
                                <td>
                                <p>65W</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tản nhiệt</p>
                                </td>
                                <td>
                                <p>C&oacute;</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <h2><strong>Đ&aacute;nh gi&aacute; CPU AMD Ryzen 5 3500 Tối Ưu Chi Ph&iacute; Cho Bộ M&aacute;y Chơi Game</strong></h2>

                    <p><a href="https://www.hacom.vn/cpu-amd-ryzen-5-3500-3-6ghz-4-1ghz-6-nhan-6-luong-16mb-cache-65w-socket-am4">AMD Ryzen 5 3500</a>&nbsp;l&agrave; CPU Ryzen thế hệ thứ 3 dựa tr&ecirc;n chế tạo FinFET 7nm. So với đối t&aacute;c của Intel, CPU n&agrave;y sẽ hiệu quả hơn (ti&ecirc;u thụ &iacute;t năng lượng hơn), điều n&agrave;y b&ugrave; lại tạo ra &iacute;t nhiệt hơn.</p>

                    <p>Kh&ocirc;ng giống như Ryzen 5 3600, Ryzen 5 3500 kh&ocirc;ng hỗ trợ si&ecirc;u ph&acirc;n luồng, v&igrave; vậy, bộ xử l&yacute; n&agrave;y cung cấp tổng cộng s&aacute;u l&otilde;i v&agrave; s&aacute;u luồng. N&oacute; cung cấp 19 MB bộ nhớ cache hệ thống, cao hơn hầu hết c&aacute;c CPU ở mức gi&aacute; n&agrave;y.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fryzen_5_3500-2.jpg?alt=media&token=5cdf8722-f1df-4a01-aa46-73c912b4e856" width="968" />
                    <figcaption></figcaption>
                    </figure>

                    <p><a href="https://www.hacom.vn/cpu-bo-vi-xu-ly" rel="noopener" target="_blank">CPU</a>&nbsp;c&oacute; thể được sử dụng tr&ecirc;n bo mạch chủ với Ổ cắm AM4 v&agrave; n&oacute; hỗ trợ bộ nhớ k&ecirc;nh đ&ocirc;i, v&igrave; vậy h&atilde;y đảm bảo rằng bạn c&oacute; hai thanh RAM đi c&ugrave;ng với bản dựng PC để cải thiện hiệu suất, đặc biệt nếu bạn xử l&yacute; phần mềm chuy&ecirc;n nghiệp. Tr&ecirc;n giấy tờ, AMD Ryzen 5 3500 thế hệ thứ 3 c&oacute; vẻ như l&agrave; một CPU tuyệt vời, nhờ tốc độ xung nhịp cơ bản cao hơn một ch&uacute;t, điều n&agrave;y khiến n&oacute; trở th&agrave;nh sự lựa chọn tuyệt vời cho một PC chơi game hạng trung.</p>

                    <p>Bỏ qua kh&iacute;a cạnh chung của AMD Ryzen 5 3500 thế hệ thứ 3, ch&uacute;ng t&ocirc;i đ&atilde; chạy một v&agrave;i điểm chuẩn để kiểm tra hiệu năng v&agrave; so s&aacute;nh n&oacute; với những người c&ugrave;ng thời. Xin lưu &yacute; rằng, c&aacute;c kết quả n&agrave;y l&agrave; d&agrave;nh ri&ecirc;ng cho thiết bị v&agrave; điểm số sẽ thay đổi t&ugrave;y theo thiết bị, t&ugrave;y thuộc v&agrave;o c&aacute;c th&agrave;nh phần kh&aacute;c.</p>

                    <h3><strong>Cinebench R20 Benchmark cho AMD Ryzen 5 3500</strong></h3>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F49430_CPUAMDRyzen535001.jpg?alt=media&token=f0189133-645a-4b0f-b6b3-3dd078797d27" width="600" />
                    <figcaption></figcaption>
                    </figure>

                    <p>&nbsp;</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Famd_ryzen_5_3500.jpg?alt=media&token=0037cc97-662d-4ad8-9a5c-c0c9c3c735eb',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'name' => 'CPU AMD Ryzen 9 7900X3D',
                'slug' => Str::slug('CPU AMD Ryzen 9 7900X3D (4.4Ghz up to 5.6Ghz/ 140MB/ 12 cores 24 threads/ 120W/ Sockets AM5)'),
                'name_full' => 'CPU AMD Ryzen 9 7900X3D (4.4Ghz up to 5.6Ghz/ 140MB/ 12 cores 24 threads/ 120W/ Sockets AM5)',
                'category_id' => 1,
                'price' => 15899000,
                'sale' => 0,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Th&ocirc;ng số kỹ thuật chi tiết CPU AMD Ryzen 9 7900X3D (4.4Ghz up to 5.6Ghz/ 140MB/ 12 cores 24 threads/ 120W/ Sockets AM5)</strong></h2>
                    <table style="width:537px">
                        <tbody>
                            <tr>
                                <td>H&atilde;ng sản xuất</td>
                                <td>AMD</td>
                            </tr>
                            <tr>
                                <td>Loại CPU</td>
                                <td>D&agrave;nh cho m&aacute;y b&agrave;n</td>
                            </tr>
                            <tr>
                                <td>Thế hệ</td>
                                <td>Ryzen 9 7000 Series</td>
                            </tr>
                            <tr>
                                <td>T&ecirc;n gọi</td>
                                <td>AMD&nbsp;Ryzen 9 7900X3D</td>
                            </tr>
                            <tr>
                                <td colspan="2">CHI TIẾT</td>
                            </tr>
                            <tr>
                                <td>Socket</td>
                                <td>AM5</td>
                            </tr>
                            <tr>
                                <td>Số nh&acirc;n</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>Số luồng</td>
                                <td>24</td>
                            </tr>
                            <tr>
                                <td>Tốc độ cơ bản</td>
                                <td>4.4GHz Upto 5.6GHz</td>
                            </tr>
                            <tr>
                                <td>Cache</td>
                                <td>768KB (L1) + 12MB (L2) + 128MB (L3)</td>
                            </tr>
                            <tr>
                                <td>Hỗ trợ bộ nhớ</td>
                                <td>DDR5 5200 MHz / 3600 MHz</td>
                            </tr>
                            <tr>
                                <td>Phi&ecirc;n bản PCI Express</td>
                                <td>PCIe 5.0</td>
                            </tr>
                            <tr>
                                <td>TDP</td>
                                <td>120W</td>
                            </tr>
                            <tr>
                                <td>Tiến tr&igrave;nh sản xuất</td>
                                <td>TSMC 5nm</td>
                            </tr>
                            <tr>
                                <td>Tốc độ GPU</td>
                                <td>Graphics Model: AMD Radeon&trade; Graphics<br />
                                Graphics Core Count: 2<br />
                                Graphics Frequency: 2200 MHz<br />
                                GPU Base: 400 MHz</td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <h2><strong>Đ&aacute;nh gi&aacute; CPU AMD Ryzen 9 7900X3D (4.4Ghz up to 5.6Ghz/ 140MB/ 12 cores 24 threads/ 120W/ Sockets AM5)</strong></h2>

                    <p>&nbsp;</p>

                    <p>CPU AMD Ryzen 9 7900X3D n&acirc;ng cao hiệu suất xử l&yacute; với hiệu năng xử l&yacute; đa nguồn kết hợp c&ocirc;ng nghệ AMD 3D V-Cache gi&uacute;p giải ph&oacute;ng sức mạnh để tối đa h&oacute;a hiệu suất của m&aacute;y t&iacute;nh.</p>

                    <p>&nbsp;</p>

                    <h3><strong>Tăng tốc tr&ograve; chơi - Hiệu năng cực cao</strong></h3>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcpu-amd-ryzen-9-7950x3d-42ghz-up-to-5.png?alt=media&token=ff3dec5c-8acc-4104-abd6-ebb67ec9f3ea" width="1596" />
                    <figcaption></figcaption>
                    </figure>

                    <p>Ryzen 9 7900X3D cung cấp sức mạnh cho c&aacute;c game đ&ograve;i hỏi khắt khe về hiệu suất, mang đến một trải nghiệm nhập vai c&oacute; một kh&ocirc;ng hai v&agrave; thống trị mọi t&aacute;c vụ đa luồng như 3D v&agrave; kết xuất video cũng như bi&ecirc;n dịch phần mềm.</p>

                    <h3><strong>Cấu tr&uacute;c Zen 4 thế hệ mới</strong></h3>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcpu-amd-ryzen-9-7950x3d-42ghz-up-to-5.jpg?alt=media&token=0ea2a676-932c-4c5f-a5b8-95fa85cb4f46" width="300" />
                    <figcaption></figcaption>
                    </figure>

                    <p>Được thiết kế với kiến tr&uacute;c &quot;Zen 4&quot; l&agrave; thiết kế thế hệ mới với tiến tr&igrave;nh 5nm FinFET. Được trang bị những cải tiến về thiết kế từ đầu đến cuối, Zen 4 của Ryzen 9 7950X3D mang đến hiệu suất cực cao, gi&uacute;p tiết kiệm năng lượng v&agrave; giảm độ trễ, đ&oacute; l&agrave; cốt l&otilde;i m&agrave; bộ vi xử l&yacute; muốn mang đến để bạn c&oacute; được trải nghiệm chơi game ho&agrave;n hảo nhất.</p>

                    <h3><strong>C&ocirc;ng nghệ AMD 3D V-Cache</strong></h3>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcpuamdryzen97950x3d42ghzupto57ghz144mb16cores32threads120wsocketsam5-aa.jpg?alt=media&token=c7125691-bd0c-4054-b265-759ebfa9abdc" width="625" />
                    <figcaption></figcaption>
                    </figure>

                    <p>CPU AMD Ryzen 7000X3D Series với thiết kế bộ nhớ đệm L3 xếp chồng l&ecirc;n nhau để giải ph&oacute;ng hiệu suất chơi game một c&aacute;ch hiệu quả, tạo ra bộ vi xử l&yacute; m&aacute;y t&iacute;nh manh mẽ vượt trội</p>

                    <h3><strong>Cải thiện hiệu suất</strong></h3>

                    <p>CPU AMD Ryzen 7000X3D Series cải thiện hiệu suất CPU với xung c&oacute; thể l&ecirc;n đến 5.7GHz gi&uacute;p cải thiện hiệu suất nh&acirc;n đơn l&ecirc;n đến 29% so với thế hệ CPU 5000 Series.</p>
                    ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Fcpu_amd_ryzen_9_7900.jpg?alt=media&token=c8bb57e3-7db6-41e0-90f0-5cdbdb57d3ad',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 6,
                'name' => 'CPU Intel Celeron G6900',
                'slug' => Str::slug('CPU Intel Celeron G6900 (3.4GHz, 2 nhân 2 luồng, 4MB Cache, 46W) - Socket Intel LGA 1700)'),
                'name_full' => 'CPU Intel Celeron G6900 (3.4GHz, 2 nhân 2 luồng, 4MB Cache, 46W) - Socket Intel LGA 1700)',
                'category_id' => 1,
                'price' => 1299000,
                'sale' => 0,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Th&ocirc;ng số kỹ thuật chi tiết CPU Intel Celeron G6900 (3.4GHz, 2 nh&acirc;n 2 luồng, 4MB Cache, 46W) - Socket Intel LGA 1700)</strong></h2>
                    <table>
                        <tbody>
                            <tr>
                                <td colspan="2">
                                <p>TH&Ocirc;NG SỐ CƠ BẢN</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Thương hiệu</p>
                                </td>
                                <td>
                                <p>Intel</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Loại CPU</p>
                                </td>
                                <td>
                                <p>D&agrave;nh cho m&aacute;y b&agrave;n</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Thế hệ&nbsp;</p>
                                </td>
                                <td>
                                <p>Celeron Thế hệ thứ 12</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>T&ecirc;n gọi</p>
                                </td>
                                <td>
                                <p>Celeron G6900</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <p>CHI TIẾT</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Socket</p>
                                </td>
                                <td>
                                <p>FCLGA 1700</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>T&ecirc;n thế hệ</p>
                                </td>
                                <td>
                                <p>Alder Lake</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số nh&acirc;n</p>
                                </td>
                                <td>
                                <p>2</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số luồng</p>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tốc độ cơ bản</p>
                                </td>
                                <td>
                                <p>Performance-core Max Turbo Frequency: 3.40 GHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Cache</p>
                                </td>
                                <td>
                                <p>4MB</p>

                                <p>Total L2 Cache:&nbsp;2.5 MB</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ 64-bit</p>
                                </td>
                                <td>
                                <p>C&oacute;</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ Si&ecirc;u ph&acirc;n luồng</p>
                                </td>
                                <td>
                                <p>Kh&ocirc;ng</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ bộ nhớ</p>
                                </td>
                                <td>
                                <p>DDR4 3200 MHz</p>

                                <p>DDR5 4800 MHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ số k&ecirc;nh bộ nhớ</p>
                                </td>
                                <td>
                                <p>2</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ c&ocirc;ng nghệ ảo h&oacute;a</p>
                                </td>
                                <td>
                                <p>C&oacute;</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Nh&acirc;n đồ họa t&iacute;ch hợp</p>
                                </td>
                                <td>
                                <p>Intel UHD Graphics 730</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tốc độ GPU t&iacute;ch hợp cơ bản</p>
                                </td>
                                <td>
                                <p>300 MHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tốc độ GPU t&iacute;ch hợp tối đa</p>
                                </td>
                                <td>
                                <p>1.3 GHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Phi&ecirc;n bản PCI Express</p>
                                </td>
                                <td>
                                <p>5.0 and 4.0</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số lane PCI Express</p>
                                </td>
                                <td>
                                <p>Up to 1x16+4, 2x8+4</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>TDP</p>
                                </td>
                                <td>
                                <p>46 W</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tản nhiệt</p>
                                </td>
                                <td>
                                <p>Mặc định đi k&egrave;m</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <h2><strong>Đ&aacute;nh gi&aacute; CPU Intel Celeron G6900 (3.7GHz, 2 nh&acirc;n 2 luồng, 4MB Cache, 46W) - Socket Intel LGA 1700)</strong></h2>

                    <p><a href="https://hacom.vn/cpu-intel-celeron-g6900-lga-1700"><strong>CPU Intel Celeron G6900</strong></a>&nbsp;l&agrave; d&ograve;ng CPU phổ th&ocirc;ng cho hệ m&aacute;y văn ph&ograve;ng ho&agrave;n to&agrave;n mới thuộc thế hệ Alder Lake của Intel. Nổi bật nhất l&agrave; hiệu năng đơn nh&acirc;n của thế hệ n&agrave;y đ&atilde; được cải tiến rất mạnh so với thế hệ tiền nhiệm, gi&uacute;p việc xử l&yacute; c&aacute;c t&aacute;c vụ nhanh ch&oacute;ng v&agrave; mượt m&agrave; hơn.&nbsp;</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcpuintelcelerong6900-1.jpg?alt=media&token=8a7de6d1-5952-4292-9338-cd6e88f8e6c9" width="3835" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Intel Celeron thế hệ Alder Lake c&oacute; n&acirc;ng cấp g&igrave;?&nbsp;</strong></h3>

                    <ul>
                        <li>Hỗ trợ cả DDR4 v&agrave; DDR5 với bus tối đa 3200 Mhz với DDR4 v&agrave; 4800 Mhz với DDR5</li>
                        <li>Đồ họa t&iacute;ch hợp HD710 mới c&oacute; hiệu năng đủ khỏe để c&oacute; thể giải tr&iacute; nhẹ nh&agrave;ng với c&aacute;c game online phổ th&ocirc;ng như LOL</li>
                    </ul>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcpuintelcelerong6900-2.jpg?alt=media&token=737684fc-97b5-4aaa-bb10-1eb6c0c54ca2" width="3835" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>T&iacute;nh tương th&iacute;ch</strong></h3>

                    <p>CPU Intel Celeron G6900 sử dụng Socket LGA 1700 ho&agrave;n to&agrave;n mới v&agrave; c&oacute; thể chạy được tr&ecirc;n c&aacute;c bo mạch chủ H610, B660, H670 &amp; Z690.&nbsp;</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Fcpu_intel_celeron_g6900.jpg?alt=media&token=7a285c11-b80f-4863-884a-6302e1106384',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 7,
                'name' => 'CPU Intel Core i3-12100',
                'slug' => Str::slug('CPU Intel Core i3-12100 (3.3GHz turbo up to 4.3GHz, 4 nhân 8 luồng, 12MB Cache, 58W)- Socket Intel LGA 1700)'),
                'name_full' => 'CPU Intel Core i3-12100 (3.3GHz turbo up to 4.3GHz, 4 nhân 8 luồng, 12MB Cache, 58W)- Socket Intel LGA 1700)',
                'category_id' => 1,
                'price' => 3799000,
                'sale' => 10,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Th&ocirc;ng số kỹ thuật chi tiết CPU Intel Core i3-12100 (3.3GHz turbo up to 4.3GHz, 4 nh&acirc;n 8 luồng, 12MB Cache, 58W)- Socket Intel LGA 1700)</strong></h2>
                    <table>
                        <tbody>
                            <tr>
                                <td colspan="2">
                                <p>TH&Ocirc;NG SỐ CƠ BẢN</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Thương hiệu</p>
                                </td>
                                <td>
                                <p>Intel</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Loại CPU</p>
                                </td>
                                <td>
                                <p>D&agrave;nh cho m&aacute;y b&agrave;n</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Thế hệ&nbsp;</p>
                                </td>
                                <td>
                                <p>Core i3 Thế hệ thứ 12</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>T&ecirc;n gọi</p>
                                </td>
                                <td>
                                <p>Core i3-12100</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <p>CHI TIẾT</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Socket</p>
                                </td>
                                <td>
                                <p>FCLGA 1700</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>T&ecirc;n thế hệ</p>
                                </td>
                                <td>
                                <p>Alder Lake</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số nh&acirc;n</p>
                                </td>
                                <td>
                                <p>4</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số luồng</p>
                                </td>
                                <td>
                                <p>8</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tốc độ cơ bản</p>
                                </td>
                                <td>
                                <p>Performance-core Max Turbo Frequency:&nbsp;4.3 GHz</p>

                                <p>Performance-core Base Frequency:&nbsp;3.30 GHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Cache</p>
                                </td>
                                <td>
                                <p>12MB</p>

                                <p>Total L2 Cache:&nbsp;5MB</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ 64-bit</p>
                                </td>
                                <td>
                                <p>C&oacute;</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ Si&ecirc;u ph&acirc;n luồng</p>
                                </td>
                                <td>
                                <p>Kh&ocirc;ng</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ bộ nhớ</p>
                                </td>
                                <td>
                                <p>DDR4 3200 MHz</p>

                                <p>DDR5 4800 MHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ số k&ecirc;nh bộ nhớ</p>
                                </td>
                                <td>
                                <p>2</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ c&ocirc;ng nghệ ảo h&oacute;a</p>
                                </td>
                                <td>
                                <p>C&oacute;</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Nh&acirc;n đồ họa t&iacute;ch hợp</p>
                                </td>
                                <td>
                                <p>Intel UHD Graphics 730</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tốc độ GPU t&iacute;ch hợp cơ bản</p>
                                </td>
                                <td>
                                <p>300 MHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tốc độ GPU t&iacute;ch hợp tối đa</p>
                                </td>
                                <td>
                                <p>1.4 GHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Phi&ecirc;n bản PCI Express</p>
                                </td>
                                <td>
                                <p>5.0 and 4.0</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số lane PCI Express</p>
                                </td>
                                <td>
                                <p>Up to 1x16+4, 2x8+4</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>TDP</p>
                                </td>
                                <td>
                                <p>58W</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tản nhiệt</p>
                                </td>
                                <td>
                                <p>Mặc định đi k&egrave;m</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <h2><strong>Đ&aacute;nh gi&aacute; CPU Intel Core i3-12100 (3.3GHz turbo up to 4.3GHz, 4 nh&acirc;n 8 luồng, 12MB Cache, 58W)- Socket Intel LGA 1700)</strong></h2>

                    <p><a href="https://hacom.vn/cpu-intel-core-i3-12100"><strong>CPU Intel Core i3-12100</strong></a>&nbsp;l&agrave; CPU thế hệ thứ 12 của Intel (Alder Lake) tr&ecirc;n nền Socket LGA 1700 với kiến tr&uacute;c ho&agrave;n to&agrave;n mới cho hiệu năng vượt trội so với người tiền nhiệm.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcpuintelcelerong6900-1.jpg?alt=media&token=8a7de6d1-5952-4292-9338-cd6e88f8e6c9" width="3240" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Thế hệ Intel Core i3 thứ 12 c&oacute; n&acirc;ng cấp g&igrave;?&nbsp;</strong></h3>

                    <ul>
                        <li>Hỗ trợ PCI-E Gen 5 mới nhất c&oacute; băng th&ocirc;ng gấp đ&ocirc;i Gen 4</li>
                        <li>Nh&acirc;n đồ họa t&iacute;ch hợp (tr&ecirc;n c&aacute;c model kh&ocirc;ng c&oacute; k&yacute; tự F) UHD 770 mạnh hơn, c&oacute; khả năng xuất h&igrave;nh đạt độ ph&acirc;n giải 8K.&nbsp;</li>
                        <li>Sức mạnh tr&ecirc;n mỗi nh&acirc;n được tăng rất nhiều so với thế hệ 11</li>
                    </ul>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F64368_cpu_intel_core_i3_12100_2.jfif?alt=media&token=22163fcf-4e87-4f73-97bc-31560c3892a7" width="3240" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>T&iacute;nh tương th&iacute;ch</strong></h3>

                    <p>CPU Intel Core i3-12100 sử dụng Socket LGA 1700 ho&agrave;n to&agrave;n mới v&agrave; c&oacute; thể chạy được tr&ecirc;n c&aacute;c bo mạch chủ H610, B660, H670 &amp; Z690.&nbsp;</p>

                    <h3><strong>Intel Core i3 d&agrave;nh cho ai?&nbsp;</strong></h3>

                    <p>L&agrave; CPU tầm trung nhắm đến hiệu năng tr&ecirc;n gi&aacute; của Intel, Core i3 sẽ ph&ugrave; hợp cho c&aacute;c bộ m&aacute;y từ tầm trung đến cao cấp, phục vụ mục đ&iacute;ch l&agrave;m việc, Gaming với mức gi&aacute; v&ocirc; c&ugrave;ng hợp l&yacute;.&nbsp;</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Famd_5800x.jpg?alt=media&token=246d740c-e9ad-4e59-905d-56781a424e5a',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 8,
                'name' => 'CPU Intel Core i5-12400F',
                'slug' => Str::slug('CPU Intel Core i5-12400F (Upto 4.4Ghz, 6 nhân 12 luồng, 18MB Cache, 65W) - Socket Intel LGA 1700)'),
                'name_full' => 'CPU Intel Core i5-12400F (Upto 4.4Ghz, 6 nhân 12 luồng, 18MB Cache, 65W) - Socket Intel LGA 1700)',
                'category_id' => 1,
                'price' => 5099000,
                'sale' => 20,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Th&ocirc;ng số kỹ thuật chi tiết CPU Intel Core i5-12400F (Upto 4.4Ghz, 6 nh&acirc;n 12 luồng, 18MB Cache, 65W) - Socket Intel LGA 1700)</strong></h2>
                    <table>
                        <tbody>
                            <tr>
                                <td colspan="2">
                                <p>TH&Ocirc;NG SỐ CƠ BẢN</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Thương hiệu</p>
                                </td>
                                <td>
                                <p>Intel</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Loại CPU</p>
                                </td>
                                <td>
                                <p>D&agrave;nh cho m&aacute;y b&agrave;n</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Thế hệ&nbsp;</p>
                                </td>
                                <td>
                                <p>Core i5 Thế hệ thứ 12</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>T&ecirc;n gọi</p>
                                </td>
                                <td>
                                <p>Core i5-12400</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <p>CHI TIẾT</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Socket</p>
                                </td>
                                <td>
                                <p>FCLGA 1700</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>T&ecirc;n thế hệ</p>
                                </td>
                                <td>
                                <p>Alder Lake</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số nh&acirc;n</p>
                                </td>
                                <td>
                                <p>6</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số luồng</p>
                                </td>
                                <td>
                                <p>12</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tốc độ cơ bản</p>
                                </td>
                                <td>
                                <p>Performance-core Max Turbo Frequency:&nbsp;4.4 GHz</p>

                                <p>Performance-core Base Frequency:&nbsp;2.50 GHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Cache</p>
                                </td>
                                <td>
                                <p>18MB</p>

                                <p>Total L2 Cache:&nbsp;7.5MB</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ 64-bit</p>
                                </td>
                                <td>
                                <p>C&oacute;</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ Si&ecirc;u ph&acirc;n luồng</p>
                                </td>
                                <td>
                                <p>Kh&ocirc;ng</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ bộ nhớ</p>
                                </td>
                                <td>
                                <p>DDR4 3200 MHz</p>

                                <p>DDR5 4800 MHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ số k&ecirc;nh bộ nhớ</p>
                                </td>
                                <td>
                                <p>2</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ c&ocirc;ng nghệ ảo h&oacute;a</p>
                                </td>
                                <td>
                                <p>C&oacute;</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Phi&ecirc;n bản PCI Express</p>
                                </td>
                                <td>
                                <p>5.0 and 4.0</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số lane PCI Express</p>
                                </td>
                                <td>
                                <p>Up to 1x16+4, 2x8+4</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>TDP</p>
                                </td>
                                <td>
                                <p>65W</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tản nhiệt</p>
                                </td>
                                <td>
                                <p>Mặc định đi k&egrave;m</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <h2><strong>Đ&aacute;nh gi&aacute; CPU Intel Core i5-12400F (Upto 4.4Ghz, 6 nh&acirc;n 12 luồng)</strong></h2>

                    <p><strong>CPU Intel Core i5-12400F</strong>&nbsp;l&agrave; CPU thế hệ thứ 12 của Intel (Alder Lake) tr&ecirc;n nền Socket LGA 1700 với kiến tr&uacute;c ho&agrave;n to&agrave;n mới cho hiệu năng vượt trội so với người tiền nhiệm.</p>

                    <p>Đ&acirc;y l&agrave; phi&ecirc;n bản kh&ocirc;ng t&iacute;ch hợp iGPU để giảm gi&aacute; th&agrave;nh, khi sử dụng bắt buộc phải c&oacute; card đồ họa rời.&nbsp;</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F62476_cpu_intel_core_i5_12400f_22.jfif?alt=media&token=55f1de2f-16c0-47b3-894f-4ea5f2a445ca" width="3240" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Thế hệ Intel Core i5 thứ 12 c&oacute; n&acirc;ng cấp g&igrave;?&nbsp;</strong></h3>

                    <ul>
                        <li>Hỗ trợ PCI-E Gen 5 mới nhất c&oacute; băng th&ocirc;ng gấp đ&ocirc;i Gen 4</li>
                        <li>Sức mạnh tr&ecirc;n mỗi nh&acirc;n được tăng rất nhiều so với thế hệ 11</li>
                    </ul>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcpu-intel-core-i5-12400f-igpu.jpg?alt=media&token=dc18c007-c7c8-4a3b-8291-79d5371756e3" width="970" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>T&iacute;nh tương th&iacute;ch</strong></h3>

                    <figure class="easyimage easyimage-full"><img alt="" src="blob:http://localhost:8080/b9b9f2d9-51f7-4113-90f9-1c6f79f7aa79" width="725" />
                    <figcaption></figcaption>
                    </figure>

                    <p>CPU Intel Core i5-12400F sử dụng Socket LGA 1700 ho&agrave;n to&agrave;n mới v&agrave; c&oacute; thể chạy được tr&ecirc;n c&aacute;c bo mạch chủ H610, B660, H670 &amp; Z690.&nbsp;</p>

                    <h3><strong>Intel Core i5 d&agrave;nh cho ai?&nbsp;</strong></h3>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcpu-intel-core-i5-12400f-mb.jpg?alt=media&token=04eb8544-3cbb-4c2b-993d-bee73d8d5046" width="2060" />
                    <figcaption></figcaption>
                    </figure>

                    <p>&nbsp;</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Fcpu_intel_core_i5_12400f.jpg?alt=media&token=cb0562b0-d802-45fd-bdf3-e6c0efc38316',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 9,
                'name' => 'CPU Intel Core i9-13900KF',
                'slug' => Str::slug('CPU Intel Core i9-13900KF (3.0GHz turbo up to 5.8Ghz, 24 nhân 32 luồng, 32MB Cache, 125W) - Socket Intel LGA 1700/Raptor Lake)'),
                'name_full' => 'CPU Intel Core i9-13900KF (3.0GHz turbo up to 5.8Ghz, 24 nhân 32 luồng, 32MB Cache, 125W) - Socket Intel LGA 1700/Raptor Lake)',
                'category_id' => 1,
                'price' => 15199000,
                'sale' => 0,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Th&ocirc;ng số kỹ thuật chi tiết CPU Intel Core i9-13900KF (3.0GHz turbo up to 5.8Ghz, 24 nh&acirc;n 32 luồng, 32MB Cache, 125W) - Socket Intel LGA 1700/Raptor Lake)</strong></h2>
                    <table style="width:609px">
                        <tbody>
                            <tr>
                                <td>
                                <p>Thương hiệu</p>
                                </td>
                                <td>
                                <p>Intel</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Loại CPU</p>
                                </td>
                                <td>
                                <p>D&agrave;nh cho m&aacute;y b&agrave;n</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Thế hệ</p>
                                </td>
                                <td>
                                <p>Core i9 Thế hệ thứ 13</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>T&ecirc;n gọi</p>
                                </td>
                                <td>
                                <p>Core i9-13900KF</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <p>CHI TIẾT</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Socket</p>
                                </td>
                                <td>
                                <p>FCLGA 1700</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>T&ecirc;n thế hệ</p>
                                </td>
                                <td>
                                <p>Alder Lake</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số nh&acirc;n</p>
                                </td>
                                <td>
                                <p>24</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số luồng</p>
                                </td>
                                <td>
                                <p>32</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tốc độ cơ bản</p>
                                </td>
                                <td>
                                <p>Tần số turbo tối đa&nbsp;: 5.80 GHz</p>

                                <p>Tần Số C&ocirc;ng Nghệ Intel&reg; Turbo Boost Max 3.0&nbsp; :&nbsp;5.70 GHz</p>

                                <p>Tần số Turbo tối đa của P-core :&nbsp;5.4 GHz</p>

                                <p>Tần số Turbo tối đa của E-core : 4.30 GHz</p>

                                <p>Tần số Cơ sở của P-core : 3.0 GHz</p>

                                <p>Tần số Cơ sở E-core : 2.2 GHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Cache</p>
                                </td>
                                <td>
                                <p>36MB</p>

                                <p>Total L2 Cache:&nbsp;32MB</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ bộ nhớ</p>
                                </td>
                                <td>
                                <p>Tối đa&nbsp;128 GB</p>

                                <p>DDR4 3200 MHz</p>

                                <p>DDR5 5600 MHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ số k&ecirc;nh bộ nhớ</p>
                                </td>
                                <td>
                                <p>2</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Nh&acirc;n đồ họa t&iacute;ch hợp</p>
                                </td>
                                <td>
                                <p>&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Phi&ecirc;n bản PCI Express</p>
                                </td>
                                <td>
                                <p>5.0 and 4.0</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số lane PCI Express</p>
                                </td>
                                <td>
                                <p>Up to 1x16+4, 2x8+4</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>TDP</p>
                                </td>
                                <td>
                                <p>C&ocirc;ng suất cơ bản: 125W</p>

                                <p>C&ocirc;ng suất tối đa: 253W</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <h2><strong>Đ&aacute;nh gi&aacute; CPU Intel Core i9-13900KF (3.0GHz turbo up to 5.8Ghz, 24 nh&acirc;n 32 luồng, 32MB Cache, 125W) - Socket Intel LGA 1700/Raptor Lake)</strong></h2>

                    <h3><strong>Thiết kế</strong></h3>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F68378_cpu_intel_core_i9_13900k_3_0ghz_turbo_up_to_5_8ghz_24_nhan_32_luong_32mb_cache_125w_socket_intel_lga_1700_alder_lake_at1-x.jpg?alt=media&token=743f3da9-15fe-475d-b5cd-925867459064" width="2048" />
                    <figcaption></figcaption>
                    </figure>

                    <p>CPU Intel Core i9 13900KF l&agrave; CPU thế hệ thứ 13 của Intel. L&agrave; đứa con mạnh mẽ v&agrave; cao cấp nhất n&ecirc;n i9 13900K được ưu &aacute;i dựa tr&ecirc;n Socket LGA 1700 v&agrave; &aacute;p dụng kiến ​​tr&uacute;c mới v&agrave; c&oacute; hiệu năng vượt trội so với c&aacute;c sản phẩm thế hệ trước. Intel Core i9 13900KF sẽ l&agrave; sự lựa chọn tuyệt vời nếu bạn muốn x&acirc;y dựng một d&agrave;n PC gaming tốt nhất hiện nay. Với số nh&acirc;n, số luồng v&agrave; tốc độ xung nhịp cao, n&oacute; sẽ ph&ugrave; hợp với c&aacute;c thiết bị cao cấp, dịch vụ ph&aacute;t trực tuyến, tr&ograve; chơi hoặc sử dụng phần mềm chuy&ecirc;n nghiệp.</p>

                    <h3><strong>Cải tiến&nbsp;</strong></h3>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcpu-intel-core-i9-13900k-30ghz-turbo-up-to-52.jpg?alt=media&token=312537a6-549b-465f-b61e-4ae554126e5a" width="960" />
                    <figcaption></figcaption>
                    </figure>

                    <p>Intel Core i9 13900KF c&oacute; thể đạt được sự gia tăng đ&aacute;ng kể về hiệu suất đa l&otilde;i, chủ yếu l&agrave; nhờ v&agrave;o 8 l&otilde;i E-core bổ sung m&agrave; d&ograve;ng Alder Lake thế hệ trước chưa c&oacute; được. Tiếp theo l&agrave; một loạt c&aacute;c cải tiến chung (IPC) cho mỗi chu kỳ. Raptor Lake-S sở hữu 24 nh&acirc;n v&agrave; 32 luồng. Sự đầu tư hẳn hoi của h&atilde;ng đ&atilde; hiển nhi&ecirc;n đưa Intel Core i9 13900K l&ecirc;n vị tr&iacute; dẫn đầu hiện nay.</p>

                    <p>Nhiều trường hợp c&ograve;n ghi nhận Intel Core i9 13900K thậm ch&iacute; c&ograve;n đạt tần số 6GHz th&ocirc;ng qua thử nghiệm đơn nh&acirc;n của phần mềm CPU-Z. Người d&ugrave;ng cũng kh&ocirc;ng cần tản nhiệt đặc biệt để đạt được xung nhịp 6085 MHz. Một bộ tản nhiệt AIO l&agrave; đủ, nhưng nhiệt độ v&agrave; mức ti&ecirc;u thụ điện năng cho thấy CPU kh&ocirc;ng qu&aacute; nặng để chạy hết c&ocirc;ng suất.</p>

                    <h3><strong>N&acirc;ng cấp hiệu năng</strong></h3>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcpu-intel-core-i9-13900k-30ghz-turbo-up-to-51.jpg?alt=media&token=dc436b89-7308-4d23-8c9a-194daab5cc32" width="2500" />
                    <figcaption></figcaption>
                    </figure>

                    <p>Intel x&aacute;c nhận d&ograve;ng CPU n&agrave;y sẽ sử dụng tiến tr&igrave;nh Intel 7, l&ecirc;n đến 24 nh&acirc;n v&agrave; 32 luồng, tức l&agrave; 8 nh&acirc;n P + 16 nh&acirc;n E, khả năng &eacute;p xung si&ecirc;u khủng, tương th&iacute;ch với nền tảng Intel Core gen 12. Do đ&oacute;, hiệu năng tr&ecirc;n Intel Core i9 13900KF được n&acirc;ng cao đ&aacute;ng kể. Song song đ&oacute;, bo mạch chủ Z790 cũng sẽ được ph&aacute;t h&agrave;nh c&ugrave;ng thời điểm. V&agrave; c&aacute;c bo mạch chủ d&ograve;ng B760 v&agrave; H710 cũng dự kiến ra mắt v&agrave;o năm sau để người d&ugrave;ng c&oacute; nhiều sự lựa chọn hơn.</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Fcpu_intel_core_i9_13900kf.jpg?alt=media&token=f107ca5e-4f7c-467c-8b13-b26b8c736682',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 10,
                'name' => 'CPU Intel Pentium Gold G6405',
                'slug' => Str::slug('CPU Intel Pentium Gold G6405 (4.1GHz, 2 nhân 4 luồng, 4MB Cache, 58W) - Socket Intel LGA 1200)'),
                'name_full' => 'CPU Intel Pentium Gold G6405 (4.1GHz, 2 nhân 4 luồng, 4MB Cache, 58W) - Socket Intel LGA 1200)',
                'category_id' => 1,
                'price' => 1799000,
                'sale' => 5,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Th&ocirc;ng số kỹ thuật chi tiết CPU Intel Pentium Gold G6405 (4.1GHz, 2 nh&acirc;n 4 luồng, 4MB Cache, 58W) - Socket Intel LGA 1200)</strong></h2>
                    <table style="width:609px">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                <p>TH&Ocirc;NG SỐ CƠ BẢN</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Thương hiệu</p>
                                </td>
                                <td>
                                <p>Intel</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Loại CPU</p>
                                </td>
                                <td>
                                <p>D&agrave;nh cho m&aacute;y b&agrave;n</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>T&ecirc;n gọi</p>
                                </td>
                                <td>
                                <p>Pentium Gold-G6405</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <p>CHI TIẾT</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Socket</p>
                                </td>
                                <td>
                                <p>LGA 1200</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>T&ecirc;n thế hệ</p>
                                </td>
                                <td>
                                <p><br />
                                Comet Lake</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số nh&acirc;n</p>
                                </td>
                                <td>
                                <p>2</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số luồng</p>
                                </td>
                                <td>
                                <p>4</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tốc độ cơ bản</p>
                                </td>
                                <td>
                                <p>4.1 GHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Cache</p>
                                </td>
                                <td>
                                <p>4MB</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tiến tr&igrave;nh sản xuất</p>
                                </td>
                                <td>
                                <p>14nm</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ 64-bit</p>
                                </td>
                                <td>
                                <p>C&oacute;</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ Si&ecirc;u ph&acirc;n luồng</p>
                                </td>
                                <td>
                                <p>Kh&ocirc;ng</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ bộ nhớ</p>
                                </td>
                                <td>
                                <p>DDR4 2666 MHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ số k&ecirc;nh bộ nhớ</p>
                                </td>
                                <td>
                                <p>2</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ c&ocirc;ng nghệ ảo h&oacute;a</p>
                                </td>
                                <td>
                                <p>C&oacute;</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Nh&acirc;n đồ họa t&iacute;ch hợp</p>
                                </td>
                                <td>
                                <p>Intel UHD Graphics 610</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tốc độ GPU t&iacute;ch hợp cơ bản</p>
                                </td>
                                <td>
                                <p>350 MHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tốc độ GPU t&iacute;ch hợp tối đa</p>
                                </td>
                                <td>
                                <p>1.05 GHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Phi&ecirc;n bản PCI Express</p>
                                </td>
                                <td>
                                <p>3.0</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số lane PCI Express</p>
                                </td>
                                <td>
                                <p>16</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>TDP</p>
                                </td>
                                <td>
                                <p>58W</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tản nhiệt</p>
                                </td>
                                <td>
                                <p>Mặc định đi k&egrave;m</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <h2><strong>Đ&aacute;nh gi&aacute; CPU Intel Pentium Gold G6405 (4.1GHz, 2 nh&acirc;n 4 luồng)</strong></h2>

                    <p><a href="https://www.hacom.vn/cpu-intel-pentium-gold-g6405"><strong>CPU Intel Pentium Gold G6405</strong></a>&nbsp;l&agrave; phi&ecirc;n bản n&acirc;ng cấp nhẹ của G6400 với xung nhịp tăng th&ecirc;m 0.1Ghz. Với 2 nh&acirc;n 4 luồng, đ&acirc;y l&agrave; CPU ph&ugrave; hợp cho c&aacute;c bộ m&aacute;y gi&aacute; rẻ, văn ph&ograve;ng hoặc giải tr&iacute; nhẹ nh&agrave;ng.&nbsp;</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F58752_cpu_intel_pentium_gold_g6405_5.jpg?alt=media&token=650c75ea-e6f3-4ef0-9e1e-14c3424a836f" width="2048" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>N&acirc;ng cấp của CPU Intel Pentium Gold G6405</strong></h3>

                    <ul>
                        <li>Xung nhịp tăng nhẹ 0.1Ghz gi&uacute;p hiệu năng tăng l&ecirc;n trong khi gi&aacute; vẫn kh&ocirc;ng đổi so với thế hệ cũ</li>
                    </ul>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F58752_cpu_intel_pentium_gold_g6405_2.jpg?alt=media&token=4a4a3832-1645-4b38-8d69-1922985e1a75" width="2048" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>T&iacute;nh tương th&iacute;ch</strong></h3>

                    <p><a href="https://www.hacom.vn/cpu-bo-vi-xu-ly">CPU</a>&nbsp;Intel Pentium Gold G6405 vẫn sử dụng socket LGA 1200 v&agrave; c&oacute; thể chạy được tr&ecirc;n c&aacute;c bo mạch chủ H410, B460, H470, Z490&nbsp; v&agrave; c&aacute;c bo mạch chủ thế hệ mới H510, B560, Z590.&nbsp;</p>

                    <h3><strong>CPU Intel Pentium Gold G6405 d&agrave;nh cho ai?&nbsp;</strong></h3>

                    <p>CPU Intel Pentium Gold G6405 với 2 nh&acirc;n v&agrave; 4 luồng xử l&yacute; c&ugrave;ng mức gi&aacute; dễ tiếp cận sẽ ph&ugrave; hợp cho c&aacute;c cấu h&igrave;nh m&aacute;y bộ văn ph&ograve;ng, học sinh - sinh vi&ecirc;n vừa l&agrave;m việc, học tập v&agrave; giải tr&iacute; nhẹ nh&agrave;ng.&nbsp;</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F58752_cpu_intel_pentium_gold_g6405_6.jpg?alt=media&token=e7f7ee3b-8d54-46c8-9df5-eff9968017cd" width="2048" />
                    <figcaption></figcaption>
                    </figure>

                    <p>&nbsp;</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Famd_5800x.jpg?alt=media&token=246d740c-e9ad-4e59-905d-56781a424e5a',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 11,
                'name' => 'CPU Intel Xeon W-1350',
                'slug' => Str::slug('CPU Intel Xeon W-1350 (3.3GHz turbo up to 5.0GHz, 6 nhân 12 luồng, 12MB Cache, 80W) - Socket Intel LGA 1200'),
                'name_full' => 'CPU Intel Xeon W-1350 (3.3GHz turbo up to 5.0GHz, 6 nhân 12 luồng, 12MB Cache, 80W) - Socket Intel LGA 1200',
                'category_id' => 1,
                'price' => 8299000,
                'sale' => 5,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Th&ocirc;ng số kỹ thuật</strong></h2>
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                <p>H&atilde;ng sản xuất</p>
                                </td>
                                <td>
                                <p>Intel</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>T&ecirc;n sản phẩm</p>
                                </td>
                                <td>
                                <p>Xeon W-1350</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ socket</p>
                                </td>
                                <td>
                                <p>FCLGA1200</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số l&otilde;i</p>
                                </td>
                                <td>
                                <p>6</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số luồng</p>
                                </td>
                                <td>
                                <p>12</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tần số turbo tối đa</p>
                                </td>
                                <td>
                                <p>5.00 GHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tần số cơ sở của bộ xử l&yacute;</p>
                                </td>
                                <td>
                                <p>3.30 GHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>B&ocirc;̣ nhớ đ&ecirc;̣m</p>
                                </td>
                                <td>
                                <p>12 MB Intel&reg; Smart Cache</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>TDP</p>
                                </td>
                                <td>
                                <p>80 W</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Bộ xử l&yacute; đồ họa</p>
                                </td>
                                <td>
                                <p>Intel&reg; UHD P750</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Phần mở rộng bộ hướng dẫn</p>
                                </td>
                                <td>
                                <p>Intel&reg; SSE4.1, Intel&reg; SSE4.2, Intel&reg; AVX2, Intel&reg; AVX-512</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <h2><strong>Đ&aacute;nh gi&aacute; CPU Intel Xeon W-1350 (3.3GHz turbo up to 5.0GHz, 6 nh&acirc;n 12 luồng, 12MB Cache, 80W) - Socket Intel LGA 1200</strong></h2>

                    <p>CPU Intel Xeon W-1350 Socket LGA 1200 l&agrave; d&ograve;ng CPU mạnh nhất tr&ecirc;n nền tảng Socket LGA với 6 nh&acirc;n &nbsp;v&agrave; 12 luồng. Đ&acirc;y l&agrave; CPU th&iacute;ch hợp cho c&aacute;c bộ m&aacute;y l&agrave;m việc hiệu năng cao, workstation PC...</p>

                    <p><br />
                    CPU n&agrave;y khi đi c&ugrave;ng với 1 chiếc bo mạch chủ W480 l&agrave; sự kết hợp ho&agrave;n hảo n&agrave;y gi&uacute;p cho bộ m&aacute;y trở n&ecirc;n bền bỉ hơn.</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Fcpu_intel_xeon_w_1350.jpg?alt=media&token=99190f7a-af47-41c2-8a3e-f7aaf5711b4d',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 12,
                'name' => 'CPU Intel Core i5-11400F',
                'slug' => Str::slug('CPU Intel Core i5-11400F (2.6GHz turbo up to 4.4Ghz, 6 nhân 12 luồng, 12MB Cache, 65W) - Socket Intel LGA 1200'),
                'name_full' => 'CPU Intel Core i5-11400F (2.6GHz turbo up to 4.4Ghz, 6 nhân 12 luồng, 12MB Cache, 65W) - Socket Intel LGA 1200',
                'category_id' => 1,
                'price' => 4099000,
                'sale' => 40,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Th&ocirc;ng số kỹ thuật chi tiết CPU Intel Core i5-11400F (2.6GHz turbo up to 4.4Ghz, 6 nh&acirc;n 12 luồng, 12MB Cache, 65W) - Socket Intel LGA 1200</strong></h2>
                    <table style="width:609px">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                <p>TH&Ocirc;NG SỐ CƠ BẢN</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Thương hiệu</p>
                                </td>
                                <td>
                                <p>Intel</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Loại CPU</p>
                                </td>
                                <td>
                                <p>D&agrave;nh cho m&aacute;y b&agrave;n</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Thế hệ</p>
                                </td>
                                <td>
                                <p>Core i5 Thế hệ thứ 11</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>T&ecirc;n gọi</p>
                                </td>
                                <td>
                                <p>Core i5-11400</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <p>CHI TIẾT</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Socket</p>
                                </td>
                                <td>
                                <p>LGA 1200</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>T&ecirc;n thế hệ</p>
                                </td>
                                <td>
                                <p><br />
                                <br />
                                Rocket Lake</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số nh&acirc;n</p>
                                </td>
                                <td>
                                <p>6</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số luồng</p>
                                </td>
                                <td>
                                <p>12</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tốc độ cơ bản</p>
                                </td>
                                <td>
                                <p>2.6 GHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tốc độ tối đa</p>
                                </td>
                                <td>
                                <p>4.4 GHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Cache</p>
                                </td>
                                <td>
                                <p>12MB</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tiến tr&igrave;nh sản xuất</p>
                                </td>
                                <td>
                                <p>14nm</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ 64-bit</p>
                                </td>
                                <td>
                                <p>C&oacute;</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ Si&ecirc;u ph&acirc;n luồng</p>
                                </td>
                                <td>
                                <p>Kh&ocirc;ng</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ bộ nhớ</p>
                                </td>
                                <td>
                                <p>DDR4 3200 MHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ số k&ecirc;nh bộ nhớ</p>
                                </td>
                                <td>
                                <p>2</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ c&ocirc;ng nghệ ảo h&oacute;a</p>
                                </td>
                                <td>
                                <p>C&oacute;</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Phi&ecirc;n bản PCI Express</p>
                                </td>
                                <td>
                                <p>4.0</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số lane PCI Express</p>
                                </td>
                                <td>
                                <p>20</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>TDP</p>
                                </td>
                                <td>
                                <p>65W</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tản nhiệt</p>
                                </td>
                                <td>
                                <p>Mặc định đi k&egrave;m</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <h2><strong>Đ&aacute;nh gi&aacute; CPU Intel Core i5-11400F (2.6GHz turbo up to 4.4Ghz, 6 nh&acirc;n 12 luồng, 12MB Cache, 65W) - Socket Intel LGA 1200</strong></h2>

                    <p><a href="https://www.hacom.vn/cpu-intel-core-i5-11400f-2.6ghz-turbo-up-to-4.4ghz-6-nhan-12-luong-12mb-cache-65w-socket-intel-lga-1200"><strong>CPU Intel Core i5-11400F</strong></a>&nbsp;l&agrave; phi&ecirc;n bản n&acirc;ng cấp của i5-10400F với xung nhịp tăng nhẹ v&agrave; hiệu suất tr&ecirc;n mỗi nh&acirc;n được cải thiện. Với 6 nh&acirc;n 12 luồng, đ&acirc;y l&agrave; CPU c&oacute; hiệu năng tr&ecirc;n gi&aacute; th&agrave;nh tốt nhất của Intel.&nbsp;</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F58403_cpu_intel_core_i5_11400f_2_6ghz_turbo_up_to_4_4ghz_6_nhan_12_luong_12mb_cache_65w_socket_intel_lga_1200_012.jpg?alt=media&token=6364b063-73b8-4ee7-b059-4463ea2a7177" width="2048" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Thế hệ Intel Core i5 thứ 11 c&oacute; n&acirc;ng cấp g&igrave;?&nbsp;</strong></h3>

                    <ul>
                        <li>Hỗ trợ PCI-E Gen 4 c&oacute; băng th&ocirc;ng gấp đ&ocirc;i Gen 3 ở thế hệ cũ</li>
                        <li>Nh&acirc;n đồ họa t&iacute;ch hợp (tr&ecirc;n c&aacute;c model kh&ocirc;ng c&oacute; k&yacute; tự F) UHD 750 mạnh hơn, c&oacute; khả năng xuất h&igrave;nh đạt độ ph&acirc;n giải 5K.&nbsp;</li>
                        <li>Hỗ trợ tập lệnh AVX-512 tăng sức mạnh t&iacute;nh to&aacute;n với khả năng xử l&yacute; dữ liễu cỡ lớn, cải thiện hiệu năng xử l&yacute; với c&aacute;c t&aacute;c vụ giải m&atilde;, render, m&atilde; ho&aacute; v&agrave; m&aacute;y học (Deep Learning)</li>
                    </ul>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F58403_cpu_intel_core_i5_11400f_2_6ghz_turbo_up_to_4_4ghz_6_nhan_12_luong_12mb_cache_65w_socket_intel_lga_1200_011.jpg?alt=media&token=4c78f444-050d-4c90-bf50-8a3690cb3a80" width="2048" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>T&iacute;nh tương th&iacute;ch</strong></h3>

                    <p>CPU Intel Core i5-11400F vẫn sử dụng socket LGA 1200 v&agrave; c&oacute; thể chạy được tr&ecirc;n c&aacute;c bo mạch chủ&nbsp; H470, Z490 (sau khi update Bios) v&agrave; c&aacute;c bo mạch chủ thế hệ mới H510, B560, Z590.&nbsp;</p>

                    <h3><strong>Intel Core i5 d&agrave;nh cho ai?&nbsp;</strong></h3>

                    <p>Với 6 nh&acirc;n 12 luồng v&agrave; hiệu năng tr&ecirc;n mỗi nh&acirc;n được n&acirc;ng cấp, Intel Core i5 sẽ ph&ugrave; hợp cho c&aacute;c bộ m&aacute;y tầm trung, phục vụ mục đ&iacute;ch Stream, Gaming hoặc l&agrave;m việc với c&aacute;c phần mềm chuy&ecirc;n dụng.&nbsp;</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2FCPU-i5-11400F.jpg?alt=media&token=51f7dfcc-33a4-4731-a7bb-32d61eccce0b',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 13,
                'name' => 'CPU Intel Core i7-11700',
                'slug' => Str::slug('CPU Intel Core i7-11700 (2.5GHz turbo up to 4.9Ghz, 8 nhân 16 luồng, 16MB Cache, 65W) - Socket Intel LGA 1200'),
                'name_full' => 'CPU Intel Core i7-11700 (2.5GHz turbo up to 4.9Ghz, 8 nhân 16 luồng, 16MB Cache, 65W) - Socket Intel LGA 1200',
                'category_id' => 1,
                'price' => 10000000,
                'sale' => 30,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Th&ocirc;ng số kỹ thuật chi tiết CPU Intel Core i7-11700 (2.5GHz turbo up to 4.9Ghz, 8 nh&acirc;n 16 luồng, 16MB Cache, 65W) - Socket Intel LGA 1200</strong></h2>
                    <table style="width:609px">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                <p>TH&Ocirc;NG SỐ CƠ BẢN</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Thương hiệu</p>
                                </td>
                                <td>
                                <p>Intel</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Loại CPU</p>
                                </td>
                                <td>
                                <p>D&agrave;nh cho m&aacute;y b&agrave;n</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Thế hệ</p>
                                </td>
                                <td>
                                <p>Core i7 Thế hệ thứ 11</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>T&ecirc;n gọi</p>
                                </td>
                                <td>
                                <p>Core i7-11700</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <p>CHI TIẾT</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Socket</p>
                                </td>
                                <td>
                                <p>LGA 1200</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>T&ecirc;n thế hệ</p>
                                </td>
                                <td>
                                <p>Rocket Lake</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số nh&acirc;n</p>
                                </td>
                                <td>
                                <p>8</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số luồng</p>
                                </td>
                                <td>
                                <p>16</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tốc độ cơ bản</p>
                                </td>
                                <td>
                                <p>2.5 GHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tốc độ tối đa</p>
                                </td>
                                <td>
                                <p>4.9 GHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Cache</p>
                                </td>
                                <td>
                                <p>12MB</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tiến tr&igrave;nh sản xuất</p>
                                </td>
                                <td>
                                <p>14nm</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ 64-bit</p>
                                </td>
                                <td>
                                <p>C&oacute;</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ Si&ecirc;u ph&acirc;n luồng</p>
                                </td>
                                <td>
                                <p>Kh&ocirc;ng</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ bộ nhớ</p>
                                </td>
                                <td>
                                <p>DDR4 3200 MHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ số k&ecirc;nh bộ nhớ</p>
                                </td>
                                <td>
                                <p>2</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ c&ocirc;ng nghệ ảo h&oacute;a</p>
                                </td>
                                <td>
                                <p>C&oacute;</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Nh&acirc;n đồ họa t&iacute;ch hợp</p>
                                </td>
                                <td>
                                <p>Intel UHD Graphics 750</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tốc độ GPU t&iacute;ch hợp cơ bản</p>
                                </td>
                                <td>
                                <p>350 MHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tốc độ GPU t&iacute;ch hợp tối đa</p>
                                </td>
                                <td>
                                <p>1.3 GHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Phi&ecirc;n bản PCI Express</p>
                                </td>
                                <td>
                                <p>4.0</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số lane PCI Express</p>
                                </td>
                                <td>
                                <p>20</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>TDP</p>
                                </td>
                                <td>
                                <p>65W</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tản nhiệt</p>
                                </td>
                                <td>
                                <p>Mặc định đi k&egrave;m</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <h2><strong>Đ&aacute;nh gi&aacute; CPU Intel Core i7-11700 (2.5GHz turbo up to 4.9Ghz, 8 nh&acirc;n 16 luồng, 16MB Cache, 65W)</strong></h2>

                    <p><a href="https://www.hacom.vn/cpu-intel-core-i7-11700-2.5ghz-turbo-up-to-4.9ghz-8-nhan-16-luong-16mb-cache-65w-socket-intel-lga-1200"><strong>CPU Intel Core i7-11700</strong></a>&nbsp;l&agrave; phi&ecirc;n bản n&acirc;ng cấp với xung nhịp tăng nhẹ v&agrave; hiệu suất tr&ecirc;n mỗi nh&acirc;n được cải thiện. Với 8 nh&acirc;n 16 luồng, đ&acirc;y l&agrave; một trong những CPU c&oacute; hiệu năng chơi game tốt nhất của Intel.&nbsp;</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fi7-11700.jpg?alt=media&token=68e963f9-8b7a-45aa-96b8-2d8f74b3736c" width="2048" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Thế hệ Intel Core i7 thứ 11 c&oacute; n&acirc;ng cấp g&igrave;?&nbsp;</strong></h3>

                    <ul>
                        <li>Hỗ trợ PCI-E Gen 4 c&oacute; băng th&ocirc;ng gấp đ&ocirc;i Gen 3 ở thế hệ cũ</li>
                        <li>Nh&acirc;n đồ họa t&iacute;ch hợp (tr&ecirc;n c&aacute;c model kh&ocirc;ng c&oacute; k&yacute; tự F) UHD 750 mạnh hơn, c&oacute; khả năng xuất h&igrave;nh đạt độ ph&acirc;n giải 5K.&nbsp;</li>
                        <li>Hỗ trợ tập lệnh AVX-512 tăng sức mạnh t&iacute;nh to&aacute;n với khả năng xử l&yacute; dữ liễu cỡ lớn, cải thiện hiệu năng xử l&yacute; với c&aacute;c t&aacute;c vụ giải m&atilde;, render, m&atilde; ho&aacute; v&agrave; m&aacute;y học (Deep Learning)</li>
                    </ul>

                    <h3><strong>T&iacute;nh tương th&iacute;ch</strong></h3>

                    <p>CPU Intel Core i7-11700 vẫn sử dụng socket LGA 1200 v&agrave; c&oacute; thể chạy được tr&ecirc;n c&aacute;c bo mạch chủ H470, Z490 (sau khi update Bios) v&agrave; c&aacute;c bo mạch chủ thế hệ mới H510, B560, Z590. Tuy nhi&ecirc;n bạn n&ecirc;n sử dụng chung với c&aacute;c bo mạch chủ B560, Z490 v&agrave; Z590 để CPU c&oacute; thể hoạt động tốt nhất.&nbsp;</p>

                    <h3><strong>Intel Core i7 d&agrave;nh cho ai?&nbsp;</strong></h3>

                    <p>Với 8 nh&acirc;n 16 luồng v&agrave; hiệu năng tr&ecirc;n mỗi nh&acirc;n được n&acirc;ng cấp, Intel Core i7 sẽ ph&ugrave; hợp cho c&aacute;c bộ m&aacute;y tầm trung v&agrave; cao cấp, phục vụ mục đ&iacute;ch Stream, Gaming hoặc l&agrave;m việc với c&aacute;c phần mềm chuy&ecirc;n dụng.&nbsp;</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Fcpu-i7-11700.jpg?alt=media&token=cecafab4-80f9-47ef-b688-2f827a3b62c1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 14,
                'name' => 'CPU Intel Core i7-13700K',
                'slug' => Str::slug('CPU Intel Core i7-13700K (3.4GHz turbo up to 5.4Ghz, 16 nhân 24 luồng, 24MB Cache, 125W) - Socket Intel LGA 1700/Raptor Lake)'),
                'name_full' => 'CPU Intel Core i7-13700K (3.4GHz turbo up to 5.4Ghz, 16 nhân 24 luồng, 24MB Cache, 125W) - Socket Intel LGA 1700/Raptor Lake)',
                'category_id' => 1,
                'price' => 11399000,
                'sale' => 0,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Th&ocirc;ng số kỹ thuật chi tiết CPU Intel Core i7-13700K (3.4GHz turbo up to 5.4Ghz, 16 nh&acirc;n 24 luồng, 24MB Cache, 125W) - Socket Intel LGA 1700/Raptor Lake)</strong></h2>
                    <table style="width:609px">
                        <tbody>
                            <tr>
                                <td>
                                <p>Thương hiệu</p>
                                </td>
                                <td>
                                <p>Intel</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Loại CPU</p>
                                </td>
                                <td>
                                <p>D&agrave;nh cho m&aacute;y b&agrave;n</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Thế hệ</p>
                                </td>
                                <td>
                                <p>Core i7 Thế hệ thứ 13</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>T&ecirc;n gọi</p>
                                </td>
                                <td>
                                <p>Core i7-13700K</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <p><strong>CHI TIẾT</strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Socket</p>
                                </td>
                                <td>
                                <p>FCLGA 1700</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>T&ecirc;n thế hệ</p>
                                </td>
                                <td>
                                <p>Alder Lake</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số nh&acirc;n</p>
                                </td>
                                <td>
                                <p>16</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số luồng</p>
                                </td>
                                <td>
                                <p>24</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tốc độ cơ bản</p>
                                </td>
                                <td>
                                <p>Tần Số C&ocirc;ng Nghệ Intel&reg; Turbo Boost Max:&nbsp;5.40 GHz</p>

                                <p>Intel&reg; Turbo Boost Max Technology 3.0 Frequency:&nbsp;5.40 GHz</p>

                                <p>Performance-core Max Turbo Frequency:&nbsp;5.3 GHz</p>

                                <p>Efficient-core Max Turbo Frequency: 4.20 GHz</p>

                                <p>Performance-core Base Frequency: 3.4 GHz</p>

                                <p>Efficient-core Base Frequency: 2.50 GHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Cache</p>
                                </td>
                                <td>
                                <p>30MB</p>

                                <p>Total L2 Cache:&nbsp;24MB</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ bộ nhớ</p>
                                </td>
                                <td>
                                <p>Tối đa&nbsp;128 GB</p>

                                <p>DDR4 3200 MHz</p>

                                <p>DDR5 5600 MHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ số k&ecirc;nh bộ nhớ</p>
                                </td>
                                <td>
                                <p>2</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Nh&acirc;n đồ họa t&iacute;ch hợp</p>
                                </td>
                                <td>
                                <p>Đồ họa UHD Intel&reg; 770</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tốc độ GPU t&iacute;ch hợp cơ bản</p>
                                </td>
                                <td>
                                <p>300 MHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Tốc độ GPU t&iacute;ch hợp tối đa</p>
                                </td>
                                <td>
                                <p>1.6 GHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Phi&ecirc;n bản PCI Express</p>
                                </td>
                                <td>
                                <p>5.0 and 4.0</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Số lane PCI Express</p>
                                </td>
                                <td>
                                <p>Up to 1x16+4, 2x8+4</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>TDP</p>
                                </td>
                                <td>
                                <p>C&ocirc;ng suất cơ bản: 125W</p>

                                <p>C&ocirc;ng suất tối đa: 253W</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <h2><strong>Đ&aacute;nh gi&aacute; CPU Intel Core i7-13700K (3.4GHz turbo up to 5.4Ghz, 16 nh&acirc;n 24 luồng, 24MB Cache, 125W) - Socket Intel LGA 1700/Raptor Lake)</strong></h2>

                    <h3><strong>Th&ocirc;ng số kỹ thuật</strong></h3>

                    <p>CPU Intel Core i7-13700K được trang bị tổng cộng 16 nh&acirc;n v&agrave; 24 luồng. Trong đ&oacute; bao gồm 8 P-Core (nh&acirc;n hiệu năng cao) dựa tr&ecirc;n kiến ​​tr&uacute;c Raptor Cove v&agrave; 8 E-Core (nh&acirc;n tiết kiệm điện) dựa tr&ecirc;n kiến ​​tr&uacute;c l&otilde;i Grace Mont. CPU đi k&egrave;m với 30 MB bộ nhớ đệm L3 v&agrave; 24 MB bộ đệm L2 cho tổng số 54 MB bộ nhớ đệm kết hợp. CPU thế hệ thứ 13 của Intel vẫn sử dụng socket LGA 1700 như thế hệ 12 tiền nhiệm n&ecirc;n người d&ugrave;ng cũng kh&ocirc;ng phải lo lắng qu&aacute; nhiều về việc phải n&acirc;ng cấp bo mạch chủ nếu muốn sở hữu những chiếc CPU n&agrave;y.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fi7-13700k-1.jfif?alt=media&token=97905c93-0bf1-4e7d-935a-28f95a68fff6" width="2048" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Hiệu năng</strong></h3>

                    <p>&nbsp;i7-13700K c&oacute; thể đạt đến ngưỡng xung nhịp l&agrave; 6.2 MHz với 8 nh&acirc;n P-core (nh&acirc;n hiệu năng cao) v&agrave; đạt 4189 MHz với 8 nh&acirc;n E-core (nh&acirc;n tiết kiệm điện). Hơn nữa, theo như một b&agrave;i test kh&aacute;c tr&ecirc;n CPU-Z, điểm chuẩn đơn nh&acirc;n của chiếc CPU đạt 1010 điểm, rất nhanh v&agrave; vượt xa những lần rỏ rỉ th&ocirc;ng tin trước đ&acirc;y ch&uacute;ng ta đ&atilde; thấy. Điểm chuẩn đa nh&acirc;n th&igrave; &iacute;t ấn tượng hơn ch&uacute;t với số điểm l&agrave; 11877 điểm.</p>

                    <p>&nbsp;i7-13700K sẽ đạt được mức hiệu năng rất vượt trội khi được trang bị c&ugrave;ng với RAM DDR5, tương tự với thế hệ thứ 12 trước đ&oacute; nhưng lần n&agrave;y thậm ch&iacute; c&ograve;n mạnh mẽ hơn. Bởi c&oacute; một ph&aacute;t hiện mới khi sử dụng Intel Core i7 13700K chạy tr&ecirc;n c&ugrave;ng một nền tảng nhưng với biến thể RAM DDR5 c&ugrave;ng Z690 Steel Legend của AsRock v&agrave; đạt điểm số cao hơn nhiều về hiệu năng đa nh&acirc;n. C&oacute; thể thấy CPU chạy tr&ecirc;n mức xung nhịp 5.3 GHz ở tất cả c&aacute;c nh&acirc;n v&agrave; mang lại điểm đa luồng tối đa l&agrave; 19811 điểm, tăng 20% so với khi sử dụng RAM DDR4.</p>

                    <h3><strong>Tương th&iacute;ch</strong></h3>

                    <p>Được biết rằng d&ograve;ng CPU Core thế hệ thứ 13 của Intel sẽ được ph&aacute;t h&agrave;nh v&agrave;o nửa cuối năm nay. Intel hiện đ&atilde; x&aacute;c nhận rằng loạt CPU n&agrave;y sẽ sử dụng quy tr&igrave;nh Intel 7, cải thiện hiệu năng rất nhiều với tối đa l&agrave; 24 nh&acirc;n v&agrave; 32 luồng, tức l&agrave; 8 nh&acirc;n P-core + 16 nh&acirc;n E-core, với khả năng &eacute;p xung vượt trội, tương th&iacute;ch với Nền tảng Core thế hệ thứ 12. C&aacute;c đối t&aacute;c của Intel cũng sẽ ph&aacute;t h&agrave;nh bo mạch chủ Z790 c&ugrave;ng l&uacute;c v&agrave; c&aacute;c bo mạch chủ d&ograve;ng B760 v&agrave; H710 c&oacute; thể được tung ra thị trường v&agrave;o năm sau, tạo cho người d&ugrave;ng th&ecirc;m nhiều sự lựa chọn hơn trong việc chọn lựa bo mạch chủ cho cả 2 thế hệ.</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Fcpu-i7-13700K.jpg?alt=media&token=d1f852ad-502a-4138-9b38-b36a298e8405',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 15,
                'name' => 'CPU Intel Core i5-10400',
                'slug' => Str::slug('CPU Intel Core i5-10400 (2.9GHz turbo up to 4.3GHz, 6 nhân 12 luồng, 12MB Cache, 65W) - Socket Intel LGA 1200'),
                'name_full' => 'CPU Intel Core i5-10400 (2.9GHz turbo up to 4.3GHz, 6 nhân 12 luồng, 12MB Cache, 65W) - Socket Intel LGA 1200',
                'category_id' => 1,
                'price' => 4699000,
                'sale' => 10,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Đ&aacute;nh gi&aacute; CPU Intel Core i5-10400 | CPU thế hệ mới 6 nh&acirc;n 12 luồng</strong></h2>
                    <p>Ph&acirc;n kh&uacute;c CPU tầm trung sẽ chẳng c&ograve;n y&ecirc;n ả với sự xuất hiện của&nbsp;<strong>Intel Core i5-10400</strong>, nhờ khắc phục to&agrave;n bộ những yếu điểm m&agrave; i5-9400 bị người d&ugrave;ng &quot;ch&ecirc;&quot; từ hồi năm ngo&aacute;i, kh&ocirc;ng ngạc nhi&ecirc;n nếu 10400 dẫn đầu top những sản phẩm b&aacute;n chạy của HANOICOMPUTER.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fi5-10400-1.jpg?alt=media&token=535a0af4-d5a6-46c0-ab03-19620a4b1f1f" width="1620" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Mức gi&aacute; hấp dẫn kh&ocirc;ng thể chối từ</strong></h3>

                    <p><a href="https://hacom.vn/cpu-intel-core-i5.html" rel="noopener" target="_blank" title="CPU Intel core I5">CPU Intel core I5</a>&nbsp;với 6 nh&acirc;n 12 luồng chỉ c&ograve;n loanh quanh trong mức gi&aacute; khoảng 5 triệu, c&aacute;ch đ&acirc;y khoảng 2 năm đ&acirc;y c&ograve;n l&agrave; điều kh&ocirc;ng tưởng. Nhưng hiện taị mọi chuyện đ&atilde; thay đổi khi Intel đ&atilde; ch&iacute;nh thức bước v&agrave;o cuộc đua về th&ocirc;ng số v&agrave; gi&aacute; cả với đối thủ truyền kiếp AMD, cơ hội để bạn sở hữu một d&agrave;n m&aacute;y chất lượng ch&iacute;nh l&agrave; thời điểm hiện tại.</p>

                    <h3><strong>D&ugrave; mục đ&iacute;ch l&agrave; g&igrave;, CPU Intel Core i5 10400 cũng c&oacute; thể thực hiện</strong></h3>

                    <p>Từ cơ bản đến cao cấp nhất,&nbsp;<a href="https://hacom.vn/cpu-intel-core-i5-104003.4ghz-turbo-up-to-4.4ghz-6-nhan-12-luong-12mb-cache-65w-socket-intel-lga-1200/p52364.html" rel="noopener" target="_blank" title="CPU Intel Core i5 10400">CPU Intel Core i5 10400</a>&nbsp;đủ sức đem lại những trải nghiệm trơn tru v&agrave; mượt m&agrave;.&nbsp;<a href="https://hacom.vn/cpu-intel/c617.html" rel="noopener" target="_blank" title="CPU Intel">Intel</a>&nbsp;đ&atilde; l&agrave;m việc chặt chẽ với những nh&agrave; sản xuất phần cứng cũng như phần mềm để đảm bảo mọi thứ c&oacute; thể chạy một c&aacute;ch ho&agrave;n hảo tr&ecirc;n những hệ thống của h&atilde;ng. Những ai y&ecirc;u th&iacute;ch sự l&agrave;nh t&iacute;nh chắc chắn sẽ kh&ocirc;ng thể bỏ qua những g&igrave; m&agrave; Intel mang lại.</p>

                    <h3><strong>Sẵn s&agrave;ng cho những n&acirc;ng cấp</strong></h3>

                    <p>Game hay c&aacute;c phần mềm th&igrave; ng&agrave;y c&agrave;ng &ldquo;ăn&rdquo; phần cứng, sẽ tốt hơn nếu trong trường hợp buộc phải n&acirc;ng cấp bạn chỉ cần phải thay thế một thứ.<strong>Intel Core i5-10400</strong>&nbsp;với xung nhịp cơ bản cũng như boost l&ecirc;n rất &ldquo;được&rdquo; sẽ l&agrave; thừa khả năng để c&acirc;n những&nbsp;<a href="https://hacom.vn/vga-card-man-hinh/c34.html" rel="noopener" target="_blank" title="Card đồ họa">VGA</a>&nbsp;cao cấp ở hiện tại cũng như trong tương lai.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fi5-10400-2.jpg?alt=media&token=b63580d5-62ac-41f6-9329-ba4a6476bedf" width="1620" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Stream sẽ kh&ocirc;ng c&ograve;n l&agrave; trở ngại</strong></h3>

                    <p>Điều khiến&nbsp;Intel&nbsp;<a href="https://hacom.vn/cpu-intel-core-i5-9400f-2.90ghz-turbo-up-to-4.10ghz-9mb-6-cores-6-threads-socket-1151-coffee-lake/p45157.html" rel="noopener" target="_blank" title="Core i5 -9400f">Core i5 -9400f</a>&nbsp;&ndash; tiền nhiệm của 10400 trở n&ecirc;n mất điểm trong mắt nhiều người d&ugrave;ng ch&iacute;nh l&agrave; khả năng g&aacute;nh v&aacute;c việc stream tr&ecirc;n nhiều nền tảng của n&oacute; kh&ocirc;ng được tốt lắm. Kể cả khi được hỗ trợ bởi một &ldquo;rổ&rdquo; RAM, n&oacute; vẫn kh&aacute; chật vật khi phải stream tr&ecirc;n con số 3 nền tảng, trong khi đ&oacute;, đối thủ AMD Ryzen 5 3600 lại tỏ ra sung sức. Giữa thời buổi nh&agrave; nh&agrave; stream, người người stream như thế n&agrave;y th&igrave; đ&acirc;y kh&ocirc;ng phải l&agrave; c&aacute;i g&igrave; đ&oacute; th&uacute; vị v&agrave; 10400 với th&ocirc;ng số kỹ thuật rất tốt hứa hẹn sẽ sửa chữa sai lầm n&agrave;y.</p>

                    <h3><strong>Th&ocirc;ng số l&yacute; tưởng</strong></h3>

                    <p><strong><a href="https://hacom.vn/cpu-intel" rel="noopener" target="_blank" title="CPU Intel">CPU Intel</a>&nbsp;Core i5-10400</strong>&nbsp;sở hữu 6 nh&acirc;n 12 luồng, mức xung mặc định 2.9GHz v&agrave; c&oacute; thể l&ecirc;n đến 4.3GHz nhờ c&ocirc;ng ngh&ecirc; Turbo Boost 2.0, cache 12MB thật sự l&agrave; một m&oacute;n hời trong tầm gi&aacute; với những người d&ugrave;ng cơ bản.</p>

                    <h3><strong>Intel Core i5-10400 sẽ d&agrave;nh cho ai?</strong></h3>

                    <p>Với đầy đủ những t&iacute;nh năng cơ bản v&agrave; mức gi&aacute; vừa t&uacute;i, bất cứ ai đang mong muốn những thay đổi trong c&ocirc;ng việc v&agrave; giải tr&iacute; đều c&oacute; thể chọn chiếc&nbsp;<a href="https://hacom.vn/cpu-bo-vi-xu-ly/c31.html" rel="noopener" target="_blank" title="CPU">CPU</a>&nbsp;n&agrave;y để đ&aacute;p ứng nhu cầu sử dụng h&agrave;ng ng&agrave;y.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fi5-10400-3.jpg?alt=media&token=6a278629-ac9e-451a-9cad-a9154544ecf4" width="1200" />
                    <figcaption></figcaption>
                    </figure>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fi5-10400-4.jpg?alt=media&token=804b9aeb-872f-4645-b053-7a0c95994427" width="1200" />
                    <figcaption></figcaption>
                    </figure>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fi5-10400-5.jpg?alt=media&token=9b786461-f105-4ff8-be3e-1ae1d305a873" width="1200" />
                    <figcaption></figcaption>
                    </figure>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fi5-10400-6.jpg?alt=media&token=3b7f7fbd-5267-4796-bf99-9f707e49754b" width="1200" />
                    <figcaption></figcaption>
                    </figure>

                    <p>&nbsp;</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Fintel_core_i5_10400.jpg?alt=media&token=a8456e4c-5c34-4e1f-992a-44b5c65e5e4b',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 16,
                'name' => 'CPU Intel Xeon W-1250P',
                'slug' => Str::slug('CPU Intel Xeon W-1250P (4.1 GHz turbo up to 4.8 GHz, 6 nhân 12 luồng, 12MB Cache, 125W) - Socket Intel LGA 1200'),
                'name_full' => 'CPU Intel Xeon W-1250P (4.1 GHz turbo up to 4.8 GHz, 6 nhân 12 luồng, 12MB Cache, 125W) - Socket Intel LGA 1200',
                'category_id' => 1,
                'price' => 9599000,
                'sale' => 10,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Đ&aacute;nh gi&aacute; CPU Intel Xeon W-1250P&nbsp;(4.1 GHz turbo up to 4.8 GHz, 6 nh&acirc;n 12 luồng, 12MB Cache, 125W) - Socket Intel LGA 1200</strong></h2>
                    <p><strong>CPU Intel Xeon W-1250P</strong>&nbsp;l&agrave; một trong những CPU mạnh nhất tr&ecirc;n nền tảng socket LGA 1200 với 6 nh&acirc;n 12 luồng. Đ&acirc;y l&agrave; CPU th&iacute;ch hợp với bo mạch chủ W480 cho c&aacute;c bộ m&aacute;y l&agrave;m việc hiệu năng cao.</p>

                    <h3><strong>Hiệu năng của CPU Intel Xeon W-1250P</strong></h3>

                    <p>Số nh&acirc;n: 6</p>

                    <p>Số luồng: 12</p>

                    <p>Xung nhịp tối đa của CPU: 4.8Ghz</p>

                    <p>CPU Intel Xeon W-1250P c&oacute; tốc độ xử l&yacute; tương đương Intel Core i5 - 10600, tuy nhi&ecirc;n được bổ xung c&aacute;c tập lệnh độc quyền chỉ c&oacute; tr&ecirc;n c&aacute;c vi xử l&yacute; Xeon n&ecirc;n cho khả năng ổn định v&agrave; l&agrave;m việc với c&aacute;c phần mềm chuy&ecirc;n dụng tốt hơn rất nhiều.&nbsp;</p>

                    <h3><strong>T&iacute;ch hợp đồ họa</strong></h3>

                    <p>Đồ họa Intel&reg; UHD P630 c&oacute; xung nhịp tối đa 1.2Ghz hỗ trợ xuất h&igrave;nh độ ph&acirc;n giải l&ecirc;n đến 4K.&nbsp;</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Fintel_xeon_w-1250P.jpg?alt=media&token=74f02bcc-3904-49df-8a83-ae66141ed559',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 17,
                'name' => 'CPU AMD Ryzen 3 3200G',
                'slug' => Str::slug('CPU AMD Ryzen 3 3200G (3.6GHz turbo up to 4.0GHz, 4 nhân 4 luồng, 4MB Cache, Radeon Vega 8, 65W) - Socket AMD AM4'),
                'name_full' => 'CPU AMD Ryzen 3 3200G (3.6GHz turbo up to 4.0GHz, 4 nhân 4 luồng, 4MB Cache, Radeon Vega 8, 65W) - Socket AMD AM4',
                'category_id' => 1,
                'price' => 3299000,
                'sale' => 30,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Đ&aacute;nh gi&aacute; CPU AMD Ryzen 3 3200G tăng xung tăng hiệu năng</strong></h2>
                    <h3><strong>Những điểm nổi bật của AMD Ryzen 3 3200G</strong></h3>

                    <p>Đ&uacute;ng theo lộ tr&igrave;nh đ&atilde; định sẵn, v&agrave;o ng&agrave;y 7/7 c&aacute;c bộ CPU Ryzen thế hệ thứ 3 của AMD đồng loạt được b&agrave;y b&aacute;n tr&ecirc;n khắp c&aacute;c cửa h&agrave;ng b&aacute;n lẻ tr&ecirc;n to&agrave;n cầu, đ&aacute;nh dấu sự khởi đầu của một cuộc c&aacute;ch mạng mới đối với cộng đồng y&ecirc;u c&ocirc;ng nghệ n&oacute;i ri&ecirc;ng v&agrave; sử ph&aacute;t triển của c&ocirc;ng nghệ sản xuất CPU n&oacute;i chung.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fryzen-3-3200g-1.jpg?alt=media&token=c1575dbc-4097-4b10-962e-8da209a8023a" width="1920" />
                    <figcaption></figcaption>
                    </figure>

                    <p>C&aacute;ch đ&acirc;y v&agrave;i năm, trước khi AMD giới thiệu kiến tr&uacute;c Zen th&igrave; việc chơi game đối với bộ xử l&yacute; đồ họa t&iacute;ch hợp tr&ecirc;n CPU gần như l&agrave; điều kh&ocirc;ng thể với rất nhiều hạn chế về khả năng xử l&yacute;. Với sự ra mắt của Ryzen 3 2200G v&agrave; Ryzen 5 2400G, 2 đại diện Raven Ridge ti&ecirc;u biểu dựa tr&ecirc;n kiến tr&uacute;c Zen+ của AMD, đem lại sự linh hoạt rất cao cho người d&ugrave;ng cả về hiệu năng lẫn khả năng n&acirc;ng cấp. Mới đ&acirc;y tại sự kiện Computex 2019, AMD vừa tung ra&nbsp;<a href="https://www.hacom.vn/cpu-amdryzen-3-3200g-3.6-ghz-4.0-ghz-with-boost-6mb-4-cores-4-threads-radeon-vega-8-/-65w">Ryzen 3 3200G</a>&nbsp;l&agrave; phi&ecirc;n bản n&acirc;ng cấp của Ryzen 3 2200G với hiệu năng đồ họa được cải thiện một c&aacute;ch r&otilde; rệt.</p>

                    <h3><strong>Hiệu năng</strong></h3>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fryzen-3-3200g-2.jpg?alt=media&token=864c0d59-b995-4a0b-a092-12d17811cc1f" width="727" />
                    <figcaption></figcaption>
                    </figure>

                    <p>Điểm thay đổi lớn nhất của Ryzen 3 3200G so với&nbsp;<a href="https://www.hacom.vn/cpu-amd-ryzen-3-2200g-35-ghz-37-ghz-with-boost-6mb-4-cores-4-threads-radeon-vega-8-socket-am4" rel="noopener" target="_blank">2200G</a>&nbsp;đ&oacute; ch&iacute;nh l&agrave; về tốc độ xử l&yacute; đ&atilde; được cải thiện l&ecirc;n kh&aacute; đ&aacute;ng kể, cả về CPU lẫn bộ xử l&yacute; đồ họa t&iacute;ch hợp Vega 8. Với hiệu năng chơi game tr&ecirc;n độ ph&acirc;n giải 1080p, nhờ v&agrave;o việc được cải thiện tốc độ xử l&yacute;, Ryzen 3 3200G chắc chắn sẽ đem lại trải nghiệm mượt m&agrave; đối với c&aacute;c tựa game e-Sport phổ biến hiện nay.</p>

                    <h3><strong>D&agrave;nh cho ai?</strong></h3>

                    <p>Sẽ thật kh&oacute; c&oacute; thể thuyết phục một game thủ hay một content creator lựa chọn Ryzen 3 3200G, v&igrave; d&ugrave; g&igrave; đi nữa đ&acirc;y vẫn l&agrave; một chiếc CPU dựa tr&ecirc;n kiến tr&uacute;c cũ (Zen+) của AMD với hiệu năng được cải thiện kh&ocirc;ng nhiều so với 2200G.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fryzen-3-3200g-3.jpg?alt=media&token=c3c09489-9f01-43c0-b3dd-da670ebbd18e" width="727" />
                    <figcaption></figcaption>
                    </figure>

                    <p>Tuy nhi&ecirc;n, nếu bạn l&agrave; một người đơn giản chỉ cần một bộ m&aacute;y t&iacute;nh nhỏ gọn với hiệu năng xử l&yacute; tốt nhất c&oacute; thể một c&aacute;ch to&agrave;n diện. Hay như đơn giản chỉ l&agrave; bạn đang bị giới hạn bởi chi ph&iacute; v&agrave; muốn c&oacute; được khả năng n&acirc;ng cấp tốt về l&acirc;u d&agrave;i th&igrave; Ryzen 3 3200G vẫn l&agrave; một lựa chọn rất đ&aacute;ng để tham khảo.</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Fryzen_3-3200G.jpg?alt=media&token=875877d9-5227-4098-a1fb-39ab667cdc70',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 18,
                'name' => 'CPU AMD Ryzen 5 5500',
                'slug' => Str::slug('CPU AMD Ryzen 5 5500 (3.6 GHz Upto 4.2GHz / 19MB / 6 Cores, 12 Threads / 65W / Socket AM4)'),
                'name_full' => 'CPU AMD Ryzen 5 5500 (3.6 GHz Upto 4.2GHz / 19MB / 6 Cores, 12 Threads / 65W / Socket AM4)',
                'category_id' => 1,
                'price' => 3999000,
                'sale' => 20,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Đ&aacute;nh gi&aacute; CPU AMD Ryzen 5 5500 (3.6 GHz Upto 4.2GHz / 19MB / 6 Cores, 12 Threads / 65W / Socket AM4)</strong></h2>
                    <p><strong>CPU AMD Ryzen 5 5500&nbsp;</strong>l&agrave; 1 trong những CPU mới nhất của Series Ryzen 5000 của AMD. CPU vẫn sử dụng Socket AM4 v&agrave; c&oacute; 6 nh&acirc;n 12 luồng c&ugrave;ng xung nhịp tối đa 4.2Ghz.&nbsp;</p>

                    <h3><strong>Kiến tr&uacute;c Zen 3</strong></h3>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fzen-3-amd.jpg?alt=media&token=ace1f411-7663-423f-ba78-b41670f3bd52" width="1260" />
                    <figcaption></figcaption>
                    </figure>

                    <p><a href="https://www.hacom.vn/cpu-bo-vi-xu-ly" rel="noopener" target="_blank">CPU</a>&nbsp;Ryzen 5000 Series sở hữu kiến tr&uacute;c Zen 3 với nhiều thay đổi mang lại hiệu năng rất cao so với thế hệ cũ. Mỗi CCX giờ đ&acirc;y sẽ c&oacute; 8 nh&acirc;n/CCX, thay v&igrave; 4 nh&acirc;n/CCX như Zen 2. C&aacute;c CCX c&oacute; thể chạy tr&ecirc;n chế độ Single Thread hoặc Two Thread SMT, cho tối đa 16 luồng/CCX. Từ đ&oacute; sẽ cho ra tối đa 16 nh&acirc;n/32 luồng. Mỗi CCD giờ đ&acirc;y sẽ chỉ chứa 1 CCX, thay v&igrave; 2 như thế hệ tiền nhiệm.</p>

                    <p>Mỗi nh&acirc;n Zen 3 tr&ecirc;n Ryzen 5000 sẽ c&oacute; 512kB Cache L2. Từ đ&oacute; c&oacute; 4MB cache L2/CCD v&agrave; nếu CPU c&oacute; 2 CCD th&igrave; tổng lượng cache L2 sẽ l&agrave; 8MB. Đi c&ugrave;ng với đ&oacute;, mỗi CCD sẽ c&oacute; th&ecirc;m 32MB cache L3 v&agrave; sẽ hợp nhất lại th&agrave;nh 1, thay v&igrave; chia l&agrave;m đ&ocirc;i như thế hệ trước.&nbsp;</p>

                    <p>Tất cả những cải tiến đ&oacute; cho ph&eacute;p:&nbsp;</p>

                    <ul>
                        <li>Xung boost cao hơn</li>
                        <li>IPC tăng l&ecirc;n tới 19%</li>
                        <li>Giảm thiểu đ&aacute;ng kể độ trễ bộ nhớ</li>
                        <li>Tăng tốc giao tiếp giữa nh&acirc;n v&agrave; cache</li>
                    </ul>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Fryzen_5_5500.jpg?alt=media&token=06a072ee-51ec-4b4c-b502-70dc4b0970e7',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 19,
                'name' => 'Card màn hình GALAX GTX 1660',
                'slug' => Str::slug('Card màn hình GALAX GTX 1660 (1 Click OC) Black (60SRH7DSY91C) - (6GB GDDR6, 192-bit, DVI+ HDMI+DP, 1x6-pin)'),
                'name_full' => 'Card màn hình GALAX GTX 1660 (1 Click OC) Black (60SRH7DSY91C) - (6GB GDDR6, 192-bit, DVI+ HDMI+DP, 1x6-pin)',
                'category_id' => 2,
                'price' => 8999000,
                'sale' => 0,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Th&ocirc;ng số kỹ thuật</strong></h2>
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                            <p>Sản phẩm</p>
                                            </td>
                                            <td>
                                            <p>Card đồ họa VGA</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <p>H&atilde;ng sản xuất</p>
                                            </td>
                                            <td>
                                            <p>&nbsp;GALAX</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <p>Engine đồ họa</p>
                                            </td>
                                            <td>
                                            <p>GeForce GTX 1660 (1-Click OC) 6GB&nbsp;</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <p>Chuẩn Bus</p>
                                            </td>
                                            <td>
                                            <p>PCI Express&nbsp;x 16</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <p>Bộ nhớ</p>
                                            </td>
                                            <td>
                                            <p>6GB GDDR5&nbsp;</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <p>Boost Clock</p>
                                            </td>
                                            <td>
                                            <p>1800 MHz</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <p>L&otilde;i CUDA</p>
                                            </td>
                                            <td>
                                            <p>1408</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <p>1-Click OC Clock&nbsp;</p>
                                            </td>
                                            <td>
                                            <p>&nbsp;1815 MHz</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <p>Giao diện bộ nhớ</p>
                                            </td>
                                            <td>
                                            <p>192-bit</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <p>Kết nối</p>
                                            </td>
                                            <td>
                                            <p>DisplayPort 1.4, HDMI 2.0b, DVI-D</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <p>K&iacute;ch thước</p>
                                            </td>
                                            <td>
                                            <p>Dimensions(with Bracket) 228*131.5*41.5 mm<br />
                                            Dimensions(without Bracket) 214*118.65*38.6 mm</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <p>PSU đề nghị</p>
                                            </td>
                                            <td>
                                            <p>450W</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <p>Power Connectors</p>
                                            </td>
                                            <td>
                                            <p>1x 6-pin</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <h2><strong>Đ&aacute;nh gi&aacute; Card m&agrave;n h&igrave;nh GALAX GTX 1660 , gi&aacute; tốt, chất lượng</strong></h2>

                    <h2><strong>Giới thiệu card m&agrave;n h&igrave;nh GALAX GeForce&nbsp;GTX 1660&nbsp;6GB GDDR5</strong></h2>

                    <p>GTX 1660&nbsp;6GB GDDR5 l&agrave; một trong những chiếc card m&agrave;n h&igrave;nh tầm trung mới nhất của GALAX, sử dụng bộ xử l&yacute; đồ họa&nbsp;GTX 1060&nbsp;đem lại hiệu năng chơi game rất tốt tr&ecirc;n độ ph&acirc;n giải&nbsp;full HD&nbsp;(1080p) với thiết kế&nbsp;tản nhiệt&nbsp;tối ưu của GALAX.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F48899_GALAX-GeForce-GTX-1660-6GB-GDDR5_001.jpg?alt=media&token=0f675130-b9cf-4225-95a8-0e42efb83a1e" width="800" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Thiết kế</strong></h3>

                    <p>GTX 1660&nbsp;6GB GDDR6 được thiết kế g&oacute;c cạnh với t&ocirc;ng m&agrave;u đen chủ đạo, to&aacute;t l&ecirc;n vẻ đẹp cứng c&aacute;p v&agrave; đơn giản.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F48899_GALAX-GeForce-GTX-1660Ti-6GB-GDDR6_002.jpg?alt=media&token=4adb0d19-976c-406e-b13f-4fc0bbe251c3" width="800" />
                    <figcaption></figcaption>
                    </figure>

                    <p>Ngo&agrave;i ra ở mặt sau của card m&agrave;n h&igrave;nh c&ograve;n l&agrave; 1 tấm backplate bằng kim loại, gi&uacute;p tăng độ cứng c&aacute;p v&agrave; tạo điểm nhấn trong thiết kế của card.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F48899_GALAX-GeForce-GTX-1660-6GB-GDDR5_003.jpg?alt=media&token=7b893896-ccde-4aa3-891a-e44a4508d360" width="800" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Tản nhiệt</strong></h3>

                    <p>GTX 1660&nbsp;6GB GDDR5 được trang bị 2 quạt l&agrave;m m&aacute;t 90mm kết hợp với 1 lớp&nbsp;tản nhiệt&nbsp;lớn đem lại hiệu năng&nbsp;tản nhiệt&nbsp;tối ưu cho bộ xử l&yacute; v&agrave; to&agrave;n bộ c&aacute;c linh kiện kh&aacute;c như bộ nhớ v&agrave; bộ cấp nguồn.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F48899_GALAX-GeForce-GTX-1660Ti-6GB-GDDR6_004.jpg?alt=media&token=21cc41d9-e6f7-43bc-a18e-7b0b4f072125" width="753" />
                    <figcaption></figcaption>
                    </figure>

                    <p>Đảm nhiệm việc dẫn nhiệt từ c&aacute;c linh kiện tr&ecirc;n card l&ecirc;n c&aacute;c l&aacute; nh&ocirc;m tr&ecirc;n&nbsp;tản nhiệt&nbsp;l&agrave; 2 ống dẫn nhiệt lớn được thiết kế để tối ưu tốc độ dẫn nhiệt.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F48899_GALAX-GeForce-GTX-1660Ti-6GB-GDDR6_005.jpg?alt=media&token=4d05cec5-9c27-4c4d-8214-2d15edd2e526" width="800" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Kết nối</strong></h3>

                    <p>Với 3 cổng kết nối DisplayPort,&nbsp;HDMI, DVI,&nbsp;GTX 1660&nbsp;6GB GDDR5 c&oacute; khả năng hỗ trợ kết nối l&ecirc;n tới 3 m&agrave;n h&igrave;nh 1 l&uacute;c.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F48899_GALAX-GeForce-GTX-1660Ti-6GB-GDDR6_006.jpg?alt=media&token=e3da7f9a-8977-4964-a809-23fcbbf2ce7f" width="800" />
                    <figcaption></figcaption>
                    </figure>

                    <p>&nbsp;</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2F_galax_gtx_1660__1_click_oc__black_01.jpg?alt=media&token=c1ac7007-24dc-4046-b138-20c1091e2519',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 20,
                'name' => 'Card màn hình Asus ROG-STRIX-RTX 3050',
                'slug' => Str::slug('Card màn hình Asus ROG-STRIX-RTX 3050-O8G-GAMING'),
                'name_full' => 'Card màn hình Asus ROG-STRIX-RTX 3050-O8G-GAMING',
                'category_id' => 2,
                'price' => 11999000,
                'sale' => 20,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Th&ocirc;ng số kỹ thuật chi tiết Card m&agrave;n h&igrave;nh Asus ROG-STRIX-RTX 3050-O8G-GAMING</strong></h2>
                    <table style="width:637px">
                        <tbody>
                            <tr>
                                <td>Sản ph&acirc;̉m</td>
                                <td>VGA - Cạc đ&ocirc;̀ họa</td>
                            </tr>
                            <tr>
                                <td>T&ecirc;n Hãng</td>
                                <td>ASUS</td>
                            </tr>
                            <tr>
                                <td>Model</td>
                                <td>ROG-STRIX-RTX 3050-O8G-GAMING</td>
                            </tr>
                            <tr>
                                <td>Engine đồ họa</td>
                                <td>NVIDIA&reg; GeForce RTX&trade;3050</td>
                            </tr>
                            <tr>
                                <td>Bộ nhớ trong</td>
                                <td>8GB</td>
                            </tr>
                            <tr>
                                <td>Kiểu bộ nhớ</td>
                                <td>GDDR6</td>
                            </tr>
                            <tr>
                                <td>Bus</td>
                                <td>128-Bit</td>
                            </tr>
                            <tr>
                                <td>Engine Clock</td>
                                <td>OC mode : 1890 MHz (Boost Clock)<br />
                                Gaming mode : 1860 MHz (Boost Clock)</td>
                            </tr>
                            <tr>
                                <td>Cuda Cores</td>
                                <td>2560</td>
                            </tr>
                            <tr>
                                <td>Memory Speed</td>
                                <td>14 Gbps</td>
                            </tr>
                            <tr>
                                <td>Chuẩn khe cắm</td>
                                <td>PCI Express 4.0 x 16</td>
                            </tr>
                            <tr>
                                <td>OpenGL</td>
                                <td>4.6</td>
                            </tr>
                            <tr>
                                <td>Độ ph&acirc;n giải</td>
                                <td>Digital Max Resolution 7680 x 4320</td>
                            </tr>
                            <tr>
                                <td>Cổng giao tiếp</td>
                                <td>Yes x 2 (Native HDMI 2.1)<br />
                                Yes x 3 (Native DisplayPort 1.4a)<br />
                                HDCP Support Yes (2.3)</td>
                            </tr>
                            <tr>
                                <td>Hỗ trợ m&agrave;n h&igrave;nh</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>K&iacute;ch thước</td>
                                <td>30 x 13.3 x 5.3 Centimeter</td>
                            </tr>
                            <tr>
                                <td>C&ocirc;ng suất nguồn y&ecirc;u cầu</td>
                                <td>550W</td>
                            </tr>
                            <tr>
                                <td>Đầu nối nguồn</td>
                                <td>1x8-pin</td>
                            </tr>
                            <tr>
                                <td>Slot</td>
                                <td>2.7 slot</td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <h2><strong>Đ&aacute;nh gi&aacute; Card m&agrave;n h&igrave;nh Asus ROG-STRIX-RTX 3050-O8G-GAMING</strong></h2>

                    <p><strong>Asus ROG-STRIX-RTX 3050-O8G-GAMING&nbsp;</strong>l&agrave; card m&agrave;n h&igrave;nh tầm trung sử dụng GPU Nvidia RTX 3050 ho&agrave;n to&agrave;n mới, ph&ugrave; hợp với nhu cầu chơi game ở độ ph&acirc;n giải Full HD.&nbsp;</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fasusrog-strix-rtx3050-8g-gaming-1.jpg?alt=media&token=4737bce7-14dc-4d71-8a1c-e5bb779ba576" width="1388" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Hiệu năng của RTX 3050</strong></h3>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fasusrog-strix-rtx3050-8g-gaming-2.jpg?alt=media&token=5dd016e0-7102-4218-b71d-033bb2d495e7" width="1568" />
                    <figcaption></figcaption>
                    </figure>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fasusrog-strix-rtx3050-8g-gaming-3.jpg?alt=media&token=1b331b91-6224-4825-a3cb-b6c3f0882040" width="1332" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Trang bị</strong></h3>

                    <ul>
                        <li>3 quạt l&agrave;m m&aacute;t: Tản nhiệt tối ưu trong mọi điều kiện</li>
                        <li>Axial Tech: Luồng gi&oacute; từ quạt tập trung hơn, tăng hiệu quả l&agrave;m m&aacute;t</li>
                    </ul>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fasusrog-strix-rtx3050-8g-gaming-4.jpg?alt=media&token=c715bc1f-7d2b-4a21-a420-9db48cfe5840" width="1161" />
                    <figcaption></figcaption>
                    </figure>

                    <ul>
                        <li>RGB: Dải LED bắt mắt tr&ecirc;n th&acirc;n card c&oacute; thể điều khiển được qua phần mềm&nbsp;</li>
                    </ul>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fasusrog-strix-rtx3050-8g-gaming-5.jpg?alt=media&token=0d3fde5c-36c3-489d-a811-fe7af8255dcb" width="1242" />
                    <figcaption></figcaption>
                    </figure>

                    <p>&nbsp;</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Fcard_man_hinh_asus_rog_strix_rtx_3050_o8g_gaming_1.jpg?alt=media&token=06ef6ea1-b8f9-41f2-aeaa-10378736df28',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 21,
                'name' => 'Card màn hình Asus ROG STRIX-RTX 4090',
                'slug' => Str::slug('Card màn hình Asus ROG STRIX-RTX 4090-O24G-GAMING'),
                'name_full' => 'Card màn hình Asus ROG STRIX-RTX 4090-O24G-GAMING',
                'category_id' => 2,
                'price' => 57999000,
                'sale' => 10,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Th&ocirc;ng số kỹ thuật chi tiết Card m&agrave;n h&igrave;nh Asus ROG STRIX-RTX 4090-O24G-GAMING</strong></h2>
                    <table style="width:674px">
                        <tbody>
                            <tr>
                                <td>Sản ph&acirc;̉m</td>
                                <td>VGA - Cạc đ&ocirc;̀ họa</td>
                            </tr>
                            <tr>
                                <td>T&ecirc;n Hãng</td>
                                <td>ASUS</td>
                            </tr>
                            <tr>
                                <td>Model</td>
                                <td>ROG STRIX-RTX 4090-O24G-GAMING</td>
                            </tr>
                            <tr>
                                <td>Engine đồ họa</td>
                                <td>NVIDIA&reg; GeForce RTX&trade;4090</td>
                            </tr>
                            <tr>
                                <td>Chuẩn khe cắm</td>
                                <td>PCI Express 4.0</td>
                            </tr>
                            <tr>
                                <td>OpenGL</td>
                                <td>OpenGL4.6</td>
                            </tr>
                            <tr>
                                <td>Bộ nhớ trong</td>
                                <td>24GB</td>
                            </tr>
                            <tr>
                                <td>Kiểu bộ nhớ</td>
                                <td>GDDR6X</td>
                            </tr>
                            <tr>
                                <td>Bus</td>
                                <td>384-Bit</td>
                            </tr>
                            <tr>
                                <td>Engine Clock</td>
                                <td>OC mode: 2640 MHz<br />
                                Default mode: 2610 MHz (Boost Clock)</td>
                            </tr>
                            <tr>
                                <td>Cuda Cores</td>
                                <td>16384</td>
                            </tr>
                            <tr>
                                <td>Memory Speed</td>
                                <td>21 Gbps</td>
                            </tr>
                            <tr>
                                <td>Độ ph&acirc;n giải</td>
                                <td>Digital Max Resolution 7680 x 4320</td>
                            </tr>
                            <tr>
                                <td>Hỗ trợ m&agrave;n h&igrave;nh</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>Hỗ trợ Nvlink</td>
                                <td>Kh&ocirc;ng</td>
                            </tr>
                            <tr>
                                <td>Cổng giao tiếp</td>
                                <td>HDMI 2.1a x 2<br />
                                DisplayPort 1.4a x 3<br />
                                HDCP&nbsp; (2.3)</td>
                            </tr>
                            <tr>
                                <td>K&iacute;ch thước</td>
                                <td>35.76 x 14.93 x 7.01 Centimeter</td>
                            </tr>
                            <tr>
                                <td>C&ocirc;ng suất nguồn y&ecirc;u cầu</td>
                                <td>1000W</td>
                            </tr>
                            <tr>
                                <td>Đầu nối nguồn</td>
                                <td>1 x 16-pin</td>
                            </tr>
                            <tr>
                                <td>Slot</td>
                                <td>3.5 slot</td>
                            </tr>
                            <tr>
                                <td>AURA SYNC</td>
                                <td>ARGB</td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <h2><strong>Đ&aacute;nh gi&aacute; Card m&agrave;n h&igrave;nh Asus ROG STRIX-RTX 4090-O12G-GAMING</strong></h2>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fasus-rog-strix-rtx-4090-1.png?alt=media&token=a3981636-e6a6-4608-a1ca-3b71455f473e" width="1500" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Hiệu năng vượt trội</strong></h3>

                    <ul>
                        <li><strong>Đa xử l&yacute; ph&aacute;t trực tuyến mới:</strong>&nbsp;Hiệu suất v&agrave; hiệu suất năng lượng l&ecirc;n đến gấp đ&ocirc;i</li>
                        <li><strong>Nh&acirc;n Tensor thế hệ thứ tư</strong>: Hiệu suất AI l&ecirc;n đến gấp đ&ocirc;i</li>
                        <li><strong>Nh&acirc;n RT thế hệ thứ ba</strong>: Hiệu suất d&ograve; tia l&ecirc;n đến 2x</li>
                        <li><strong>GPU ti&ecirc;n tiến</strong>: Kiến tr&uacute;c NVIDIA Ada Lovelace&nbsp;</li>
                        <li><strong>Đồ họa ch&acirc;n thực v&agrave; sống động</strong>: L&otilde;i d&ograve; tia chuy&ecirc;n dụng</li>
                        <li><strong>Hiệu suất tăng tốc bằng AI</strong>: NVIDIA DLSS 3</li>
                        <li><strong>Khả năng phản hồi chiến thắng trong tr&ograve; chơi</strong>: Nền tảng độ trễ thấp NVIDIA Reflex&nbsp;</li>
                        <li><strong>Được x&acirc;y dựng để ph&aacute;t trực tiếp</strong>: Bộ m&atilde; h&oacute;a NVIDIA&nbsp;</li>
                        <li><strong>Video v&agrave; giọng n&oacute;i n&acirc;ng cao AI</strong>: Ứng dụng NVIDIA Broadcast&nbsp;</li>
                        <li><strong>Theo d&otilde;i nhanh sự s&aacute;ng tạo của bạn</strong>: NVIDIA Studio</li>
                        <li><strong>Hiệu suất v&agrave; độ tin cậ</strong>y: Game Ready v&agrave; Studio Drivers</li>
                    </ul>

                    <h3><strong>Tối ưu h&oacute;a khả năng l&agrave;m m&aacute;t</strong></h3>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fasus-rog-strix-rtx-4090-2.png?alt=media&token=ba381136-0b9e-4c81-900d-c6831ee57c60" width="1358" />
                    <figcaption></figcaption>
                    </figure>

                    <ul>
                        <li>Axial-tech fans gi&uacute;p luồng kh&ocirc;ng kh&iacute; mạnh hơn 23% so với thế hệ trước đ&oacute;, gi&uacute;p Asus ROG Strix RTX 4090 24GB m&aacute;t hơn v&agrave; cũng v&igrave; thế m&agrave; trở n&ecirc;n ổn định, bền v&agrave; hiệu năng cao hơn.</li>
                        <li>Quạt Axial lowns mang lại khả năng tản nhiệt tốt hơn, &aacute;p suất kh&ocirc;ng kh&iacute; nhiều hơn 19,3% so với c&aacute;c quạt thế hệ trước được sử dụng tr&ecirc;n&nbsp;<strong>ROG Strix GeForce RTX 3090</strong></li>
                        <li>K&iacute;ch thước bề mặt để tản nhiệt nhiều hơn 30% so với thế hệ trước</li>
                        <li>Buồng hơi giảm 5 &deg; C so với thiết kế buồng hơi th&ocirc;ng thường</li>
                    </ul>

                    <h3><strong>Cứng c&aacute;p hơn</strong></h3>

                    <ul>
                        <li><strong>Khung kim loại</strong></li>
                        <li>
                        <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fasus-rog-strix-rtx-4090-3.png?alt=media&token=594032dd-8282-4f9c-a2ac-ec21b63a39af" width="1065" />
                        <figcaption></figcaption>
                        </figure>

                        <p>&nbsp;</p>
                        </li>
                        <li><strong>Backplate</strong></li>
                    </ul>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fasus-rog-strix-rtx-4090-4.png?alt=media&token=ef834510-2a11-452c-a0e0-6d6fa1831137" width="2557" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>PCB thiết kế nhỏ gọn</strong></h3>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fasus-rog-strix-rtx-4090-5.png?alt=media&token=dde6daa9-3cc0-407e-bed2-b6327904276b" width="2035" />
                    <figcaption></figcaption>
                    </figure>

                    <p>Thiết kế tối ưu h&oacute;a gi&uacute;p PCB ngắn hơn, giảm mức ti&ecirc;u hao điện năng v&agrave; cho ph&eacute;p nhiệt tho&aacute;t ra ngo&agrave;i qua một lỗ th&ocirc;ng hơi lớn ở tấm nền</p>

                    <h3><strong>RGB rực rỡ với Aura Sync</strong></h3>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fasus-rog-strix-rtx-4090-6.png?alt=media&token=3f9a2e63-5f74-4c33-afde-e7e4a3bd8fa0" width="1698" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Hiệu năng RTX 4090</strong></h3>

                    <p>GPU NVIDIA Ada Lovelace sẽ l&agrave; nền tảng cung cấp sức mạnh cho c&aacute;c card đồ họa GeForce RTX 40 series thế hệ tiếp theo. Mức ti&ecirc;u thụ điện năng lớn của RTX 4090 đem lại hiệu năng mạnh hơn so với thế hệ đời trước cũng như đối thủ AMD Radeon RX 7000 dựa tr&ecirc;n RDNA 3.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fasus-rog-strix-rtx-4090-7.png?alt=media&token=9641eb94-c7ee-4511-962b-45c2c19f8bea" width="941" />
                    <figcaption></figcaption>
                    </figure>

                    <ul>
                        <li><strong>Hiệu năng Render của RTX4090&nbsp;</strong>( nguồn kopite7kimi)</li>
                    </ul>

                    <p>Về khả năng xử l&yacute; c&aacute;c t&aacute;c vụ l&agrave;m việc,RTX 4090 đ&atilde; ghi được hơn 19.000 điểm trong b&agrave;i kiểm tra đồ họa Time Spy Extreme của 3DMark. Điểm số 19.000 cho thấy h&agrave;ng đầu của NVIDIA Ada Lovelace&nbsp;<strong>nhanh hơn tới 82%</strong>&nbsp;so với người tiền nhiệm trực tiếp của n&oacute;,&nbsp;<strong>RTX 3090</strong>&nbsp;v&agrave;&nbsp;<strong>nhanh hơn gần 70% so với RTX 3090 Ti.</strong></p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fasus-rog-strix-rtx-4090-8.png?alt=media&token=d86b7b6f-3cb7-4aff-a1fe-735c2d9a3445" width="708" />
                    <figcaption></figcaption>
                    </figure>

                    <ul>
                        <li><strong>Hiệu năng chơi game của RTX 4090</strong>&nbsp;( Nguồn: techspot)</li>
                    </ul>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fasus-rog-strix-rtx-4090-9.png?alt=media&token=4afae22f-d436-4bc4-9052-7b08560341cb" width="1536" />
                    <figcaption></figcaption>
                    </figure>

                    <p>GeForce RTX 4090 thế hệ tiếp theo của NVIDIA l&agrave; một con qu&aacute;i vật thực sự ở &quot;vũ trụ Card đồ họa&quot;. Theo số liệu từ ​​nh&agrave; c&aacute;c nh&agrave; sản xuất chip, chiếc flagship Ada Lovelace nhanh hơn 70-90% so với RTX 3090 Ti trong c&aacute;c tựa game kh&ocirc;ng phải RT. Trong khi đ&oacute;, c&aacute;c tựa game c&oacute; t&iacute;nh năng d&ograve; t&igrave;m tia v&agrave; DLSS 3.0 c&oacute; thể nhanh hơn gấp 4 lần so với d&ograve;ng Ampere h&agrave;ng đầu hiện nay.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fasus-rog-strix-rtx-4090-10.png?alt=media&token=e5e9ec69-418d-4440-ab8f-1869b8943601" width="1920" />
                    <figcaption></figcaption>
                    </figure>

                    <p>&nbsp;</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Fcard_man_hinh_asus_rog_strix_rtx_4090_o24g_gaming__1_.jpg?alt=media&token=ace7dd95-0ab6-4c56-9b80-b49db4d2c135',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 22,
                'name' => 'Card màn hình Asus TUF GTX 1650-4GD6-P-GAMING',
                'slug' => Str::slug('Card màn hình Asus TUF GTX 1650-4GD6-P-GAMING (4GB GDDR6, 128-bit, DVI+HDMI+DP)'),
                'name_full' => 'Card màn hình Asus TUF GTX 1650-4GD6-P-GAMING (4GB GDDR6, 128-bit, DVI+HDMI+DP)',
                'category_id' => 2,
                'price' => 5499000,
                'sale' => 10,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Th&ocirc;ng số kỹ thuật chi tiết Card m&agrave;n h&igrave;nh Asus TUF GTX 1650-4GD6-P-GAMING (4GB GDDR6, 128-bit, DVI+HDMI+DP)</strong></h2>
                    <table style="width:980px">
                        <tbody>
                            <tr>
                                <td>
                                <p>Sản ph&acirc;̉m</p>
                                </td>
                                <td>
                                <p>VGA - Cạc đ&ocirc;̀ họa</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>T&ecirc;n Hãng</p>
                                </td>
                                <td>
                                <p>ASUS</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Model</p>
                                </td>
                                <td>
                                <p>GTX 1650-4GD6-P-GAMING</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Engine đồ họa</p>
                                </td>
                                <td>
                                <p>NVIDIA&reg; GeForce GTX&trade;1650</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Bộ nhớ trong</p>
                                </td>
                                <td>
                                <p>4Gb</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Kiểu bộ nhớ</p>
                                </td>
                                <td>
                                <p>GDDR6</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Bus</p>
                                </td>
                                <td>
                                <p>128-Bit</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Engine Clock</p>
                                </td>
                                <td>
                                <p>OC Mode &ndash; 1620 MHz (Boost Clock)</p>

                                <p>Gaming Mode (Default) &ndash; GPU Boost Clock : 1590 MHz, CPU Base Clock: 1410 MHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>L&otilde;i CUDA</p>
                                </td>
                                <td>
                                <p>896</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Memory Speed</p>
                                </td>
                                <td>
                                <p>12 Gbps</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>DirectX</p>
                                </td>
                                <td>
                                <p>12 API</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Chuẩn khe cắm</p>
                                </td>
                                <td>
                                <p>PCI Express 3.0</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Độ ph&acirc;n giải</p>
                                </td>
                                <td>
                                <p>7680x4320</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Cổng giao tiếp</p>
                                </td>
                                <td>
                                <p>Display Port x 1</p>

                                <p>HDMI x 2</p>

                                <p>DVI-D x 1</p>

                                <p>HDCP : C&oacute;</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Hỗ trợ m&agrave;n h&igrave;nh</p>
                                </td>
                                <td>
                                <p>3</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>C&ocirc;ng suất nguồn ti&ecirc;u thụ</p>
                                </td>
                                <td>
                                <p>75W</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>C&ocirc;ng suất nguồn y&ecirc;u cầu</p>
                                </td>
                                <td>
                                <p>300W</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>K&iacute;ch thước</p>
                                </td>
                                <td>
                                <p>20.6 x 12.5 x 4.6 centim&eacute;t</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <h2><strong>Đ&aacute;nh gi&aacute; Card m&agrave;n h&igrave;nh Asus TUF GTX 1650-4GD6-P-GAMING Ch&iacute;nh H&atilde;ng</strong></h2>

                    <p><strong>Card m&agrave;n h&igrave;nh Asus TUF GTX 1650-4GD6-P-GAMING</strong>&nbsp;l&agrave; phi&ecirc;n bản n&acirc;ng cấp bộ nhớ từ GDDR5 l&ecirc;n GDDR6 cho hiệu năng cải thiện rất nhiều. Đ&acirc;y l&agrave; d&ograve;ng card đồ họa Entry-Level với gi&aacute; th&agrave;nh dễ chịu đủ đ&aacute;p ứng nhu cầu chơi game của đại đa số người d&ugrave;ng phổ th&ocirc;ng.&nbsp;</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F56279_card_man_hinh_asus_tuf_gtx_1650_4gd6_p_gaming-1.jpg?alt=media&token=d92d2d8e-466a-44a9-80d3-4fe7cfec1a9a" width="2048" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Hiệu năng đột ph&aacute;</strong></h3>

                    <p>Nh&acirc;n đồ họa GTX 1650 kết hợp c&ugrave;ng bộ nhớ GDDR6 cho hiệu năng được cải thiện rất nhiều so với thế hệ trước l&agrave; GTX 1050, thậm ch&iacute; c&ograve;n đem lại hiệu năng chơi game tr&ecirc;n độ ph&acirc;n giải 1080p cao hơn đ&aacute;ng kể so với GTX 1050Ti.&nbsp;</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F56279_card_man_hinh_asus_tuf_gtx_1650_4gd6_p_gaming-2.jpg?alt=media&token=2bf9e9a4-3702-4673-b42e-fe1a68bb9fad" width="2048" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Thiết kế nhỏ gọn</strong></h3>

                    <p>Card m&agrave;n h&igrave;nh Card m&agrave;n h&igrave;nh Asus TUF GTX 1650-4GD6-P-GAMING sở hữu thiết kế 2 quạt nhỏ gọn, nh&atilde; nhặn. K&iacute;ch thước n&agrave;y ph&ugrave; hợp cho 99% c&aacute;c hệ thống tr&ecirc;n thị trường, bất chấp k&iacute;ch thước hạn chế của th&ugrave;ng m&aacute;y.&nbsp;</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F56279_card_man_hinh_asus_tuf_gtx_1650_4gd6_p_gaming-3.jpg?alt=media&token=cdc0dde3-81c9-4e72-8819-136092c44670" width="2048" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Tản nhiệt</strong></h3>

                    <p>Sở hữu quạt tản nhiệt k&eacute;p, người d&ugrave;ng sẽ kh&ocirc;ng bao giờ phải lo lắng Card m&agrave;n h&igrave;nh Asus TUF GTX 1650-4GD6-P-GAMING bị qu&aacute; nhiệt khi chạy hết c&ocirc;ng suất.&nbsp;</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F56279_card_man_hinh_asus_tuf_gtx_1650_4gd6_p_gaming-4.jpg?alt=media&token=52749950-0c3e-4592-a278-36c4098d9a98" width="2048" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Quy tr&igrave;nh sản xuất</strong></h3>

                    <p>To&agrave;n bộ c&aacute;c d&ograve;ng card m&agrave;n h&igrave;nh của ASUS đều được sản xuất bằng d&acirc;y chuyền tự động gi&uacute;p hạn chế sai s&oacute;t một c&aacute;ch tối đa, đồng thời được trải qua c&ocirc;ng đoạn kiểm định nghi&ecirc;m ngặt nhằm đem lại trải nghiệm tốt nhất tới với người d&ugrave;ng.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F56279_card_man_hinh_asus_tuf_gtx_1650_4gd6_p_gaming-5.jpg?alt=media&token=dbcb46b3-b879-4dbb-b52b-b3331106a2b1" width="2048" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>GPU Tweak II</strong></h3>

                    <p>Với phần mềm GPU Tweak II, người d&ugrave;ng ho&agrave;n to&agrave;n c&oacute; thể điều chỉnh, &eacute;p xung Card m&agrave;n h&igrave;nh Asus PH-GTX1650-O4GD6-P theo &yacute; muốn của m&igrave;nh để c&oacute; được hiệu năng chơi game tốt nhất.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F56279_card_man_hinh_asus_tuf_gtx_1650_4gd6_p_gaming-6.jpg?alt=media&token=f0e3283e-472b-461f-94f7-9355a86f0151" width="1739" />
                    <figcaption></figcaption>
                    </figure>

                    <p>&nbsp;</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Fcard_man_hinh_asus_tuf_gtx_1650_4g_gaming.jpg?alt=media&token=a412107c-1938-4e25-b281-87549131385b',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 23,
                'name' => 'Card màn hình Asus TUF-RTX 3080-O12G-GAMING',
                'slug' => Str::slug('Card màn hình Asus TUF-RTX 3080-O12G-GAMING'),
                'name_full' => 'Card màn hình Asus TUF-RTX 3080-O12G-GAMING',
                'category_id' => 2,
                'price' => 27999000,
                'sale' => 20,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Th&ocirc;ng số kỹ thuật chi tiết Card m&agrave;n h&igrave;nh Asus TUF-RTX 3080-O12G-GAMING</strong></h2>
                    <table style="width:980px">
                        <tbody>
                            <tr>
                                <td>
                                <p>Sản ph&acirc;̉m</p>
                                </td>
                                <td>
                                <p>VGA - Cạc đ&ocirc;̀ họa</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>T&ecirc;n Hãng</p>
                                </td>
                                <td>
                                <p>ASUS</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Model</p>
                                </td>
                                <td>
                                <p>TUF-RTX 3080-O12G-GAMING</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Engine đồ họa</p>
                                </td>
                                <td>
                                <p>NVIDIA&reg; GeForce RTX&trade;3080</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Bộ nhớ trong</p>
                                </td>
                                <td>
                                <p>12GB</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Kiểu bộ nhớ</p>
                                </td>
                                <td>
                                <p>GDDR6X</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Bus</p>
                                </td>
                                <td>
                                <p>256-Bit</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Engine Clock</p>
                                </td>
                                <td>
                                <p>OC Mode - 1815 MHz (Boost Clock)<br />
                                Gaming Mode (Default) - GPU Boost Clock : 1785 MHz</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Cuda Cores</p>
                                </td>
                                <td>
                                <p>8960</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Memory Speed</p>
                                </td>
                                <td>
                                <p>19 Gbps</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Chuẩn khe cắm</p>
                                </td>
                                <td>
                                <p>PCI Express 4.0 x 16</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Độ ph&acirc;n giải</p>
                                </td>
                                <td>
                                <p>Digital Max Resolution 7680 x 4320</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Cổng giao tiếp</p>
                                </td>
                                <td>
                                <p>Yes&nbsp;x&nbsp;2&nbsp;(Native&nbsp;HDMI 2.0b)</p>

                                <p>Yes&nbsp;x&nbsp;3&nbsp;(Native&nbsp;DisplayPort 1.4)<br />
                                HDCP Support Yes (2.3)</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>C&ocirc;ng suất nguồn y&ecirc;u cầu</p>
                                </td>
                                <td>
                                <p>850W</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>Đầu nối nguồn</p>
                                </td>
                                <td>
                                <p>2 x 8-pin</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <p>K&iacute;ch thước</p>
                                </td>
                                <td>
                                <p>29.9 x 12.6 x 5.17 Centimeter &ndash; 2.7 Slot</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <h2><strong>Đ&aacute;nh gi&aacute; Card m&agrave;n h&igrave;nh Asus TUF-RTX 3080-O12G-GAMING</strong></h2>

                    <p><strong>Card m&agrave;n h&igrave;nh Asus TUF-RTX 3080-O12G-GAMING</strong>&nbsp;l&agrave; 1 trong những card đồ họa cao cấp nhất của Asus phục vụ cho nhu cầu chơi game ở độ ph&acirc;n giải 4K c&ugrave;ng thiết lập đồ họa tối đa.&nbsp;</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F63619_card_man_hinh_asus_tuf_rtx_3080_o12g_gaming-1.jpg?alt=media&token=37485f92-774e-49d2-baf4-9551ab6df203" width="2048" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Thiết kế</strong></h3>

                    <p>Card m&agrave;n h&igrave;nh Asus TUF-RTX 3080-O12G-GAMING l&agrave; d&ograve;ng sản phẩm hướng đến độ bền v&agrave; hiệu năng/ gi&aacute; th&agrave;nh n&ecirc;n sản phẩm c&oacute; thiết kế mạnh mẽ nam t&iacute;nh, k&iacute;ch thước khủng với 3 quạt l&agrave;m m&aacute;t cỡ lớn.&nbsp;</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F63619_card_man_hinh_asus_tuf_rtx_3080_o12g_gaming-2.jpg?alt=media&token=cc43d9f1-fbbf-4b37-9926-81d3332db95c" width="2048" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Hiệu năng của RTX 3080 12GB</strong></h3>

                    <p>Nhờ được tăng th&ecirc;m dung lượng VRAM v&agrave; số nh&acirc;n Cuda, RTX 3080 phi&ecirc;n bản 12GB sẽ c&oacute; hiệu năng vượt trội hơn so với phi&ecirc;n bản 3080 10GB ti&ecirc;u chuẩn v&agrave; tiệm cận sức mạnh với RTX 3080Ti</p>

                    <h3><strong>Tản nhiệt</strong></h3>

                    <ul>
                        <li>Axial Fan: Tăng cường luồng kh&ocirc;ng kh&iacute; để l&agrave;m m&aacute;t tối ưu kh&ocirc;ng chỉ từ cấu tr&uacute;c v&acirc;n sọc tr&ecirc;n mỗi c&aacute;nh quạt m&agrave; c&ograve;n cả bề mặt nhẵn ở ph&iacute;a dưới.</li>
                        <li>C&aacute;nh quạt quay đảo chiều: Tăng hiệu quả l&agrave;m m&aacute;t to&agrave;n diện đến bề mặt heatsink</li>
                    </ul>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F63619_card_man_hinh_asus_tuf_rtx_3080_o12g_gaming-3.jpg?alt=media&token=3f360612-ce28-46b4-8207-84f05cafd7ad" width="2048" />
                    <figcaption></figcaption>
                    </figure>

                    <ul>
                        <li>Back Plate kim loại</li>
                        <li>0dB Technology: Quạt chỉ quay khi nhiệt độ đạt mức nhất định - tối ưu giữa l&agrave;m m&aacute;t v&agrave; giữ y&ecirc;n lặng</li>
                    </ul>

                    <h3><strong>T&iacute;nh năng</strong></h3>

                    <ul>
                        <li>Auto Extreme: C&ocirc;ng nghệ sản xuất ho&agrave;n to&agrave;n bằng m&aacute;y m&oacute;c, hạn chế tối đa lỗi tr&ecirc;n mỗi sản phẩm.&nbsp;</li>
                        <li>Linh kiện chất lượng cao cho 1 sản phẩm cao cấp</li>
                        <li>LED RGB t&ugrave;y chỉnh bằng phần mềm</li>
                        <li>Phần mềm Asus GPU Tweak II</li>
                    </ul>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F63619_card_man_hinh_asus_tuf_rtx_3080_o12g_gaming-4.jpg?alt=media&token=2c242d68-d209-4884-92d6-bc3300240aaf" width="1629" />
                    <figcaption></figcaption>
                    </figure>

                    <p>&nbsp;</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Fcard_man_hinh_asus_tuf_rtx_3080_o12g_gaming_1.jpg?alt=media&token=d0b8975d-6c24-4a97-a8e8-6f737f414246',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 24,
                'name' => 'Card màn hình Gigabyte GTX 1050 Ti D5 4GD',
                'slug' => Str::slug('Card màn hình Gigabyte GTX 1050 Ti D5 4GD'),
                'name_full' => 'Card màn hình Gigabyte GTX 1050 Ti D5 4GD',
                'category_id' => 2,
                'price' => 5299000,
                'sale' => 30,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h3><strong>Th&ocirc;ng số kỹ thuật chi tiết Card m&agrave;n h&igrave;nh Gigabyte GTX 1050 Ti D5 4GD</strong></h3>
                    <table style="width:980px">
                        <tbody>
                            <tr>
                                <td>Sản phẩm</td>
                                <td>Card đồ họa VGA</td>
                            </tr>
                            <tr>
                                <td>H&atilde;ng sản xuất</td>
                                <td>GIGABYTE</td>
                            </tr>
                            <tr>
                                <td>Model</td>
                                <td>GTX 1050 Ti D5 4GD</td>
                            </tr>
                            <tr>
                                <td>Engine đồ họa</td>
                                <td>NVIDIA&reg; GTX 1050 Ti&trade;</td>
                            </tr>
                            <tr>
                                <td>Chuẩn Bus</td>
                                <td>PCI Express 3.0 x 16</td>
                            </tr>
                            <tr>
                                <td>Memory Clock</td>
                                <td>7008 MHz</td>
                            </tr>
                            <tr>
                                <td>Bộ nhớ</td>
                                <td>4GB GDDR5</td>
                            </tr>
                            <tr>
                                <td>Bus bộ nhớ</td>
                                <td>128-bit</td>
                            </tr>
                            <tr>
                                <td>CUDA Cores</td>
                                <td>&nbsp;768</td>
                            </tr>
                            <tr>
                                <td>Core Clock</td>
                                <td>Boost: 1430 MHz / Base: 1316 MHz in OC modeBoost: 1392 MHz / Base: 1290 MHz in Gaming mode</td>
                            </tr>
                            <tr>
                                <td>Cổng xuất h&igrave;nh</td>
                                <td>HDMI 2.0 x 1&nbsp;DVI-D x 1<br />
                                &nbsp;Display Port 1.4 x 1</td>
                            </tr>
                            <tr>
                                <td>C&ocirc;ng suất nguồn y&ecirc;u cầu</td>
                                <td>Từ 300W</td>
                            </tr>
                            <tr>
                                <td>K&iacute;ch thước (DxRxC)&nbsp;</td>
                                <td>17.2 x 11.3 x 3.0 centimeter</td>
                            </tr>
                            <tr>
                                <td>Hỗ trợ m&agrave;n h&igrave;nh</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>DIRECTX hỗ trợ</td>
                                <td>12 API</td>
                            </tr>
                            <tr>
                                <td>OPENGL hỗ trợ</td>
                                <td>4.5</td>
                            </tr>
                            <tr>
                                <td>Độ ph&acirc;n giải tối đa</td>
                                <td>7680x4320</td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <h2><strong>Đ&aacute;nh gi&aacute; Card m&agrave;n h&igrave;nh Gigabyte GTX 1050 Ti D5 4GD ch&iacute;nh h&atilde;ng, cực bền</strong></h2>

                    <p><strong>Card m&agrave;n h&igrave;nh Gigabyte GTX 1050 Ti D5 4GD</strong>&nbsp;l&agrave; d&ograve;ng sản phẩm card đồ họa chuy&ecirc;n dụng cho chơi game ở ph&acirc;n kh&uacute;c Entry Level.&nbsp;</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fgiga-gtx-1050-ti-1.jpg?alt=media&token=90e6e3eb-dd40-4b45-a031-425e53a0c658" width="3120" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Thiết kế&nbsp;</strong></h3>

                    <p>Card m&agrave;n h&igrave;nh Gigabyte GTX 1050 Ti D5 4GD sở hữu thiết kế với chỉ 1 quạt, v&ocirc; c&ugrave;ng nhỏ gọn v&agrave; c&oacute; thể lắp đặt trong mọi th&ugrave;ng m&aacute;y. Thiết kế n&agrave;y sẽ đặc biệt ph&ugrave; hợp cho c&aacute;c hệ thống iTX ưu ti&ecirc;n sự nhỏ gọn.&nbsp;</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fgiga-gtx-1050-ti-2.jpg?alt=media&token=45e10f78-de32-4b9d-b988-962cd381fbd1" width="3120" />
                    <figcaption></figcaption>
                    </figure>

                    <p>Với 1 quạt k&iacute;ch thước 90mm v&agrave; kh&ocirc;ng ti&ecirc;u hao qu&aacute; nhiều điện năng, Card m&agrave;n h&igrave;nh Gigabyte GTX 1050 Ti D5 4GD hoạt động rất m&aacute;t mẻ v&agrave; y&ecirc;n tĩnh.&nbsp;</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fgiga-gtx-1050-ti-3.jpg?alt=media&token=9d53d876-9ae4-41b0-9fec-fdb5547d061d" width="1540" />
                    <figcaption></figcaption>
                    </figure>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fgiga-gtx-1050-ti-4.jpg?alt=media&token=a8b0e4e4-7d8d-49c5-922e-e4fcb3580bc0" width="1476" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Hiệu năng</strong></h3>

                    <p>Card m&agrave;n h&igrave;nh Gigabyte GTX 1050 Ti D5 4GD c&oacute; thể chơi tốt c&aacute;c tựa game phổ th&ocirc;ng như LOL, Fifa Online, CS:GO ở thiết lập trung b&igrave;nh hoặc cao.&nbsp;</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fgiga-gtx-1050-ti-5.jpg?alt=media&token=3f4895b6-936c-45a5-ab5c-d90afc65a06a" width="1436" />
                    <figcaption></figcaption>
                    </figure>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fgiga-gtx-1050-ti-6.jpg?alt=media&token=4fb43dd2-524d-4f71-859a-fa1082f32b1d" width="1329" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Bảo h&agrave;nh&nbsp;</strong></h3>

                    <p>Card m&agrave;n h&igrave;nh Gigabyte GTX 1050 Ti D5 4GD được bảo h&agrave;nh 3 năm ch&iacute;nh h&atilde;ng</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fgiga-gtx-1050-ti-7.jpg?alt=media&token=61ab0b50-84c6-4ffd-a915-e927b3275f77" width="1586" />
                    <figcaption></figcaption>
                    </figure>

                    <p>&nbsp;</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Fcard_man_hinh_gigabyte_gtx_1050_ti_d5_4gd_1.jpg?alt=media&token=fa54d776-60ca-4a10-ade9-be60dfba3911',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 25,
                'name' => 'Card màn hình Gigabyte GTX 1660 Ti D6 - 6GD',
                'slug' => Str::slug('Card màn hình Gigabyte GTX 1660 Ti D6 - 6GD'),
                'name_full' => 'Card màn hình Gigabyte GTX 1660 Ti D6 - 6GD',
                'category_id' => 2,
                'price' => 8299000,
                'sale' => 20,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Th&ocirc;ng số kỹ thuật chi tiết Card m&agrave;n h&igrave;nh Gigabyte GTX 1660 Ti D6 - 6GD</strong></h2>
                    <table style="width:637px">
                        <tbody>
                            <tr>
                                <td>Sản ph&acirc;̉m</td>
                                <td>VGA - Cạc đ&ocirc;̀ họa</td>
                            </tr>
                            <tr>
                                <td>T&ecirc;n Hãng</td>
                                <td>GIGABYTE</td>
                            </tr>
                            <tr>
                                <td>Model</td>
                                <td>GTX 1660 Ti D6 - 6GD</td>
                            </tr>
                            <tr>
                                <td>Engine đồ họa</td>
                                <td>NVIDIA&reg; GeForce GTX&trade;1660S</td>
                            </tr>
                            <tr>
                                <td>Bộ nhớ trong</td>
                                <td>6GB</td>
                            </tr>
                            <tr>
                                <td>Kiểu bộ nhớ</td>
                                <td>GDDR6</td>
                            </tr>
                            <tr>
                                <td>Bus</td>
                                <td>192-Bit</td>
                            </tr>
                            <tr>
                                <td>Engine Clock</td>
                                <td>1770 MHz</td>
                            </tr>
                            <tr>
                                <td>Cuda Cores</td>
                                <td>1536</td>
                            </tr>
                            <tr>
                                <td>Memory Speed</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Chuẩn khe cắm</td>
                                <td>PCI Express 3.0 x16</td>
                            </tr>
                            <tr>
                                <td>Độ ph&acirc;n giải</td>
                                <td>Digital Max Resolution 7680 x 4320</td>
                            </tr>
                            <tr>
                                <td>Cổng giao tiếp</td>
                                <td>DisplayPort 1.4 *3<br />
                                HDMI 2.0b *1</td>
                            </tr>
                            <tr>
                                <td>K&iacute;ch thước</td>
                                <td>22.4 x 12.1 x 4.0 Centimeter</td>
                            </tr>
                            <tr>
                                <td>DirectX</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>OpenGL</td>
                                <td>4.6</td>
                            </tr>
                            <tr>
                                <td>Đầu nối nguồn</td>
                                <td>1x8-pin</td>
                            </tr>
                            <tr>
                                <td>C&ocirc;ng suất nguồn y&ecirc;u cầu</td>
                                <td>450W</td>
                            </tr>
                        </tbody>
                    </table>

                    <h2><strong>Đ&aacute;nh gi&aacute; Card m&agrave;n h&igrave;nh Gigabyte GTX 1660 Ti D6 - 6GD</strong></h2>

                    <p>Card m&agrave;n h&igrave;nh Gigabyte GTX 1660 Ti D6 - 6GD là chi&ecirc;́c&nbsp;<a href="https://www.hacom.vn/vga-card-man-hinh" rel="noopener" target="_blank">card đ&ocirc;̀ họa</a>&nbsp;t&acirc;̀m trung mới nh&acirc;́t đ&ecirc;́n từ GIGABYTE, sử dụng b&ocirc;̣ xử lý đ&ocirc;̀ họa GTX 1660 mạnh mẽ, với hi&ecirc;̣u năng vượt tr&ocirc;̣i hơn th&ecirc;́ h&ecirc;̣ đàn anh GTX 1060 và là đ&ocirc;́i thủ cạnh tranh trực ti&ecirc;́p với b&ocirc;̣ RX 590.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcard-man-hinh-gigabyte-gtx-1660-ti-oc-6gd-1.jpg?alt=media&token=d21e86c5-31b7-470b-b0f3-acac3b65493e" width="1536" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Thi&ecirc;́t k&ecirc;́</strong></h3>

                    <p>Card m&agrave;n h&igrave;nh Gigabyte GTX 1660 Ti D6 - 6GD có hi&ecirc;̣u năng tản nhi&ecirc;̣t r&acirc;́t t&ocirc;́t nhờ vào thi&ecirc;́t k&ecirc;́ tản nhi&ecirc;̣t của GIGABYTE, k&ecirc;́t hợp với vi&ecirc;̣c sử dụng ki&ecirc;́n trúc Turing, đem lại m&ocirc;̣t chi&ecirc;́c&nbsp;<a href="https://hacom.vn/vga-card-man-hinh" rel="noopener" target="_blank" title="card đồ họa">card đ&ocirc;̀ họa</a>&nbsp;có hi&ecirc;̣u năng chơi game xu&acirc;́t sắc tr&ecirc;n đ&ocirc;̣ ph&acirc;n giải 1080p với mức c&ocirc;ng su&acirc;́t ti&ecirc;u thụ và nhi&ecirc;̣t đ&ocirc;̣ hoạt đ&ocirc;̣ng th&acirc;́p.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcard-man-hinh-gigabyte-gtx-1660-ti-oc-6gd-2.jpg?alt=media&token=d04f1016-f768-4aa8-b6ff-60b5ebafc12f" width="1200" />
                    <figcaption></figcaption>
                    </figure>

                    <p>M&ocirc;̣t đi&ecirc;̉m n&ocirc;̉i b&acirc;̣t của GIGABYTE GTX 1660 6GB GDDR5 OC là t&acirc;́m &quot;back plate&quot; ở ph&acirc;̀n mặt sau của card, vừa giúp tăng đ&ocirc;̣ cứng cáp cho bo mạch vừa tăng tính th&acirc;̉m mỹ trong thi&ecirc;́t k&ecirc;́.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcard-man-hinh-gigabyte-gtx-1660-ti-oc-6gd-3.jpg?alt=media&token=48ddf954-4d2a-417b-af48-22eb6af41ec0" width="800" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Tản nhi&ecirc;̣t</strong></h3>

                    <p>Với vi&ecirc;̣c sử dụng b&ocirc;̣ xử lý đ&ocirc;̣ họa t&acirc;̀m trung có c&ocirc;ng su&acirc;́t th&acirc;́p như GTX 1660, chi&ecirc;́c card đ&ocirc;̀ họa này có th&ecirc;̉ hoạt đ&ocirc;̣ng hoàn toàn &ocirc;̉n định ngay cả khi sử dụng tản nhi&ecirc;̣t có kích thước nhỏ gọn.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcard-man-hinh-gigabyte-gtx-1660-ti-oc-6gd-4.jpg?alt=media&token=bb24e205-78f2-4b8a-a2cf-39c0ab2fe116" width="1523" />
                    <figcaption></figcaption>
                    </figure>

                    <p>GIGABYTE GTX 1660 6GB GDDR5 OC có thi&ecirc;́t k&ecirc;́ quạt tản nhi&ecirc;̣t khá đặc bi&ecirc;̣t, với hướng chuy&ecirc;̉n đ&ocirc;̣ng ngược chi&ecirc;̀u nhau loại bỏ hi&ecirc;̣n tượng nhi&ecirc;̃u loạn kh&ocirc;ng khí b&ecirc;n tr&ecirc;n tản nhi&ecirc;̣t giúp cải thi&ecirc;̣n hi&ecirc;̣u năng tản nhi&ecirc;̣t đáng k&ecirc;̉.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcard-man-hinh-gigabyte-gtx-1660-ti-oc-6gd-5.jpg?alt=media&token=ffbe4a31-339b-4d7c-aa0f-e19c2ab05ef6" width="1200" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>B&ocirc;̣ c&acirc;́p ngu&ocirc;̀n</strong></h3>

                    <p>Dựa tr&ecirc;n thi&ecirc;́t k&ecirc;́ nguy&ecirc;n bản của GTX 1660, các kĩ sư của GIGABYTE đã thi&ecirc;́t k&ecirc;́ lại GTX 1660 6GB GDDR5 OC với b&ocirc;̣ c&acirc;́p ngu&ocirc;̀n 4+2 &quot;phase&quot; so với 3+1 &quot;phase&quot; tr&ecirc;n thi&ecirc;́t k&ecirc;́ của NVIDIA, giúp cải thi&ecirc;̣n khả năng c&acirc;́p ngu&ocirc;̀n và tu&ocirc;̉i thọ của card.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcard-man-hinh-gigabyte-gtx-1660-ti-oc-6gd-6.jpg?alt=media&token=91246e32-a3fd-40fe-9a2f-727924b552ac" width="800" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Ph&acirc;̀n m&ecirc;̀m</strong></h3>

                    <p>Game thủ hoàn toàn có th&ecirc;̉ tùy chỉnh GIGABYTE GTX 1660 6GB GDDR6 OC th&ocirc;ng qua b&ocirc;̣ ph&acirc;̀n m&ecirc;̀m AORUS Engine đ&ecirc;̉ có được hi&ecirc;̣u năng t&ocirc;́t nh&acirc;́t m&ocirc;̣t cách cực kì d&ecirc;̃ dàng.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcard-man-hinh-gigabyte-gtx-1660-ti-oc-6gd-7.jpg?alt=media&token=367d22bb-70f6-457f-95be-eb032fa68bbd" width="800" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Hiệu năng</strong></h3>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcard-man-hinh-gigabyte-gtx-1660-ti-oc-6gd-8.jpg?alt=media&token=c52476c9-0219-4a20-9a7e-f3a2a64fb31f" width="922" />
                    <figcaption></figcaption>
                    </figure>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcard-man-hinh-gigabyte-gtx-1660-ti-oc-6gd-9.jpg?alt=media&token=ef59b505-619a-46f8-8bc1-8a9001b07633" width="1326" />
                    <figcaption></figcaption>
                    </figure>

                    <p>&nbsp;</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Fcard_man_hinh_gigabyte_gtx_1660_ti_d6_6gd__5_.jpg?alt=media&token=f37e6c4c-9d94-43af-bd60-07364adcd648',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 26,
                'name' => 'Card màn hình Gigabyte RTX 2060 Super WINDFORCE OC-8GD',
                'slug' => Str::slug('Card màn hình Gigabyte RTX 2060 Super WINDFORCE OC-8GD'),
                'name_full' => 'Card màn hình Gigabyte RTX 2060 Super WINDFORCE OC-8GD',
                'category_id' => 2,
                'price' => 7999000,
                'sale' => 0,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Th&ocirc;ng số kỹ thuật chi tiết Card m&agrave;n h&igrave;nh Gigabyte RTX 2060 Super WINDFORCE OC-8GD</strong></h2>
                    <table style="width:674px">
                        <tbody>
                            <tr>
                                <td>Sản ph&acirc;̉m</td>
                                <td>VGA - Cạc đ&ocirc;̀ họa</td>
                            </tr>
                            <tr>
                                <td>T&ecirc;n Hãng</td>
                                <td>GIGABYTE</td>
                            </tr>
                            <tr>
                                <td>Model</td>
                                <td>RTX 2060 Super WINDFORCE OC-8GD</td>
                            </tr>
                            <tr>
                                <td>Engine đồ họa</td>
                                <td>NVIDIA&reg; GeForce RTX&trade;2060</td>
                            </tr>
                            <tr>
                                <td>Chuẩn khe cắm</td>
                                <td>PCI Express 3.0</td>
                            </tr>
                            <tr>
                                <td>DirectX</td>
                                <td>DirectX 12 Ultimate/OpenGL4.6</td>
                            </tr>
                            <tr>
                                <td>Bộ nhớ trong</td>
                                <td>8GB</td>
                            </tr>
                            <tr>
                                <td>Kiểu bộ nhớ</td>
                                <td>GDDR6</td>
                            </tr>
                            <tr>
                                <td>Bus</td>
                                <td>256-Bit</td>
                            </tr>
                            <tr>
                                <td>Engine Clock</td>
                                <td>1680 MHz (Reference Card: 1650 MHz)</td>
                            </tr>
                            <tr>
                                <td>Cuda Cores</td>
                                <td>2176</td>
                            </tr>
                            <tr>
                                <td>Memory Speed</td>
                                <td>14000 MHz</td>
                            </tr>
                            <tr>
                                <td>Độ ph&acirc;n giải</td>
                                <td>Digital Max Resolution 7680 x 4320</td>
                            </tr>
                            <tr>
                                <td>Hỗ trợ m&agrave;n h&igrave;nh</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>Hỗ trợ Nvlink</td>
                                <td>Kh&ocirc;ng</td>
                            </tr>
                            <tr>
                                <td>Cổng giao tiếp</td>
                                <td>HDMI 2.0b x 1<br />
                                DisplayPort 1.4a x 3</td>
                            </tr>
                            <tr>
                                <td>K&iacute;ch thước</td>
                                <td>26.5 x 12.1 x 4.0 Centimeter</td>
                            </tr>
                            <tr>
                                <td>C&ocirc;ng suất nguồn y&ecirc;u cầu</td>
                                <td>550W</td>
                            </tr>
                            <tr>
                                <td>Đầu nối nguồn</td>
                                <td>1 x 8-pin</td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <h2><strong>Đ&aacute;nh gi&aacute; Card m&agrave;n h&igrave;nh Gigabyte RTX 2060 Super WINDFORCE OC-8GD ch&iacute;nh h&atilde;ng</strong></h2>

                    <p><strong>Card m&agrave;n h&igrave;nh Gigabyte RTX 2060 Super WINDFORCE OC</strong>&nbsp;l&agrave; card đồ họa thuộc ph&acirc;n kh&uacute;c tầm trung của Gigabyte, ph&ugrave; hợp cho nhu cầu chơi c&aacute;c tựa game nặng ở độ ph&acirc;n giải Full HD</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fgigabyte-rtx-2060-S-1.jpg?alt=media&token=e79939af-782e-4445-95c4-5cb9a3abb46a" width="1689" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Thiết kế</strong></h3>

                    <p>Card m&agrave;n h&igrave;nh Gigabyte RTX 2060 Super WINDFORCE OC sở hữu thiết kế đậm chất gaming với 2 quạt tản nhiệt k&iacute;ch thước lớn</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fgigabyte-rtx-2060-S-2.jpg?alt=media&token=d6768c63-ed68-4b57-95ae-e8dc8628ee41" width="1467" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Hiệu năng</strong></h3>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fgigabyte-rtx-2060-S-3.jpg?alt=media&token=f4661cd5-5784-4205-8efa-df9a9b82f3ea" width="1683" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Trang bị</strong></h3>

                    <ul>
                        <li>2 quạt l&agrave;m m&aacute;t k&iacute;ch thước 100mm quay ngược chiều nhau để tạo ra luồng gi&oacute; tối ưu</li>
                        <li>Back Plate bảo vệ mặt sau</li>
                        <li>D&agrave;n linh kiện chất lượng cao, đảm bảo độ bền v&agrave; khả năng hoạt động ổn định&nbsp;</li>
                    </ul>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fgigabyte-rtx-2060-S-4.jpg?alt=media&token=d830d3fc-ac64-4ba8-a5ee-38dd80ddf544" width="1623" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Phần mềm</strong></h3>

                    <p>Gigabyte cung cấp cho người d&ugrave;ng phần mềm Aorus Engine gi&uacute;p theo d&otilde;i v&agrave; kiểm so&aacute;t ho&agrave;n to&agrave;n card đồ họa theo nhu cầu của từng c&aacute; nh&acirc;n.&nbsp;</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fgigabyte-rtx-2060-S-5.jpg?alt=media&token=2f8e0196-9f4a-4e56-af20-e2ac89b8db8c" width="1556" />
                    <figcaption></figcaption>
                    </figure>

                    <p>&nbsp;</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Fcard_man_hinh_gigabyte_rtx_2060_super_windforce_oc_8gd_1.jpg?alt=media&token=9b35bc94-eb4f-4dba-85fa-22d090ef2b21',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 27,
                'name' => 'Card màn hình Gigabyte RTX 3060 AORUS ELITE 12GD-V2',
                'slug' => Str::slug('Card màn hình Gigabyte RTX 3060 AORUS ELITE 12GD-V2'),
                'name_full' => 'Card màn hình Gigabyte RTX 3060 AORUS ELITE 12GD-V2',
                'category_id' => 2,
                'price' => 10699000,
                'sale' => 0,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Th&ocirc;ng số kỹ thuật chi tiết Card m&agrave;n h&igrave;nh Gigabyte RTX 3060 AORUS ELITE 12GD-V2</strong></h2>
                    <table style="width:980px">
                        <tbody>
                            <tr>
                                <td>Sản phẩm</td>
                                <td>Card đồ họa VGA</td>
                            </tr>
                            <tr>
                                <td>H&atilde;ng sản xuất</td>
                                <td>GIGA</td>
                            </tr>
                            <tr>
                                <td>Model</td>
                                <td>RTX 3060 AORUS ELITE 12GD-V2</td>
                            </tr>
                            <tr>
                                <td>Engine đồ họa</td>
                                <td>NVIDIA&reg; RTX 3060&trade;</td>
                            </tr>
                            <tr>
                                <td>Chuẩn Bus</td>
                                <td>PCI Express 4.0 x 16</td>
                            </tr>
                            <tr>
                                <td>Memory Clock</td>
                                <td>15 Gbps</td>
                            </tr>
                            <tr>
                                <td>Bộ nhớ</td>
                                <td>12GB GDDR6</td>
                            </tr>
                            <tr>
                                <td>Bus bộ nhớ</td>
                                <td>192-bit</td>
                            </tr>
                            <tr>
                                <td>CUDA Cores</td>
                                <td>&nbsp;3584</td>
                            </tr>
                            <tr>
                                <td>Core Clock</td>
                                <td>1867 MHz (Reference Card: 1777 MHz)</td>
                            </tr>
                            <tr>
                                <td>Cổng xuất h&igrave;nh</td>
                                <td>HDMI 2.1 x 2<br />
                                Display Port x2 (v1.4a)</td>
                            </tr>
                            <tr>
                                <td>C&ocirc;ng suất nguồn y&ecirc;u cầu</td>
                                <td>Từ 550W</td>
                            </tr>
                            <tr>
                                <td>Kết nối nguồn&nbsp;</td>
                                <td>1 x 8-pin, 1 x 6-pin</td>
                            </tr>
                            <tr>
                                <td>K&iacute;ch thước (DxRxC)&nbsp;</td>
                                <td>29.6 x 11.7 x 5.6 centimeter</td>
                            </tr>
                            <tr>
                                <td>DIRECTX hỗ trợ</td>
                                <td>12 API</td>
                            </tr>
                            <tr>
                                <td>OPENGL hỗ trợ</td>
                                <td>4.6</td>
                            </tr>
                            <tr>
                                <td>Độ ph&acirc;n giải tối đa</td>
                                <td>7680x4320</td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <p>&nbsp;</p>

                    <h2><strong>Đ&aacute;nh gi&aacute; Card m&agrave;n h&igrave;nh Gigabyte RTX 3060 AORUS ELITE 12GD-V3 ch&iacute;nh h&atilde;ng, bảo h&agrave;nh d&agrave;i</strong></h2>

                    <p><strong><a href="https://hacom.vn/vga-card-man-hinh">Card m&agrave;n h&igrave;nh</a>&nbsp;Gigabyte RTX 3060 AORUS ELITE 12GD-V2</strong>&nbsp;l&agrave; card đồ họa tầm trung của Gigabyte phục vụ cho nhu cầu chơi game ở độ ph&acirc;n giải 1080p v&agrave; 2K.</p>

                    <p>*Đ&acirc;y l&agrave; phi&ecirc;n bản Low Hash Rate - Hạn chế khả năng đ&agrave;o coin tuy nhi&ecirc;n hiệu năng chơi game vẫn giữ nguy&ecirc;n như phi&ecirc;n bản thường.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Faorus-rtx-3060-1.jpg?alt=media&token=94dce448-0a67-45dd-9d48-dd7bd19c5d47" width="1465" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Hiệu năng của Card m&agrave;n h&igrave;nh Gigabyte RTX 3060 ELITE 12G</strong></h3>

                    <p>Card m&agrave;n h&igrave;nh Gigabyte RTX 3060 AORUS ELITE 12GD-V2 c&oacute; hiệu năng vượt trội so với người tiền nhiệm l&agrave; RTX 2060.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Faorus-rtx-3060-2.jpg?alt=media&token=b0443bcb-9e77-42d2-a3a6-bbb5b9c392f7" width="1218" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Khả năng l&agrave;m m&aacute;t</strong></h3>

                    <ul>
                        <li>C&aacute;nh quạt c&oacute; r&atilde;nh 3D: Tạo ra luồng gi&oacute; mượt m&agrave; hơn</li>
                        <li>C&aacute;nh quạt trung t&acirc;m quay ngược chiều: Tạo ra khả năng l&agrave;m m&aacute;t tổng thể tốt hơn</li>
                        <li>Quạt chỉ quay khi nhiệt độ cao: Giữ y&ecirc;n lặng khi cần thiết</li>
                        <li>Độ bền quạt gấp 2.1 lần nhờ c&ocirc;ng nghệ Graphene</li>
                        <li>Ống dẫn nhiệt bằng đồng tiếp x&uacute;c trực tiếp với bề mặt GPU</li>
                    </ul>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Faorus-rtx-3060-3.jpg?alt=media&token=99adabf2-c140-4bb7-bfe7-88ef0021492d" width="1778" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>T&iacute;nh năng</strong></h3>

                    <ul>
                        <li>RGB Fusion 2.0: T&ugrave;y chỉnh LED RGB t&iacute;ch hợp sẵn tr&ecirc;n Card m&agrave;n h&igrave;nh Gigabyte RTX 3060 AORUS ELITE 12GD-V2 bằng phần mềm</li>
                        <li>N&uacute;t gạt chuyển đổi nhanh giữa 2 chế độ tr&ecirc;n th&acirc;n card</li>
                        <li>Backplate kim loại</li>
                        <li>Đ&egrave;n b&aacute;o nguồn ở cổng cắm 8 v&agrave; 6 pin</li>
                    </ul>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Faorus-rtx-3060-4.jpg?alt=media&token=b445189a-d702-439e-9906-ed44b7e27831" width="1681" />
                    <figcaption></figcaption>
                    </figure>

                    <p>&nbsp;</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Fcard_man_hinh_gigabyte_rtx_3060_aorus_elite_12gd_v2_1.jpg?alt=media&token=19cf8c6e-7da4-47ca-b541-46c8af1a89af',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 28,
                'name' => 'Card màn hình Gigabyte RTX 3060 GAMING OC 12GD-V2',
                'slug' => Str::slug('Card màn hình Gigabyte RTX 3060 GAMING OC 12GD-V2'),
                'name_full' => 'Card màn hình Gigabyte RTX 3060 GAMING OC 12GD-V2',
                'category_id' => 2,
                'price' => 9099000,
                'sale' => 0,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Th&ocirc;ng số kỹ thuật chi tiết Card m&agrave;n h&igrave;nh Gigabyte RTX 3060 GAMING OC 12GD-V2</strong></h2>
                    <table style="width:980px">
                        <tbody>
                            <tr>
                                <td>Sản phẩm</td>
                                <td>Card đồ họa VGA</td>
                            </tr>
                            <tr>
                                <td>H&atilde;ng sản xuất</td>
                                <td>GIGA</td>
                            </tr>
                            <tr>
                                <td>Model</td>
                                <td>RTX 3060 GAMING OC 12GD-V2</td>
                            </tr>
                            <tr>
                                <td>Engine đồ họa</td>
                                <td>NVIDIA&reg; RTX 3060&trade;</td>
                            </tr>
                            <tr>
                                <td>Chuẩn Bus</td>
                                <td>PCI Express 4.0 x 16</td>
                            </tr>
                            <tr>
                                <td>Memory Clock</td>
                                <td>15 Gbps</td>
                            </tr>
                            <tr>
                                <td>Bộ nhớ</td>
                                <td>12GB GDDR6</td>
                            </tr>
                            <tr>
                                <td>Bus bộ nhớ</td>
                                <td>192-bit</td>
                            </tr>
                            <tr>
                                <td>CUDA Cores</td>
                                <td>&nbsp;3584</td>
                            </tr>
                            <tr>
                                <td>Core Clock</td>
                                <td>1837 MHz (Reference Card: 1777 MHz)</td>
                            </tr>
                            <tr>
                                <td>Cổng xuất h&igrave;nh</td>
                                <td>HDMI 2.1 x 2<br />
                                Display Port x2 (v1.4a)</td>
                            </tr>
                            <tr>
                                <td>C&ocirc;ng suất nguồn y&ecirc;u cầu</td>
                                <td>Từ 550W</td>
                            </tr>
                            <tr>
                                <td>Kết nối nguồn&nbsp;</td>
                                <td>1 x 8-pin</td>
                            </tr>
                            <tr>
                                <td>K&iacute;ch thước (DxRxC)&nbsp;</td>
                                <td>28.2 x 11.7 x 4.1 centimeter</td>
                            </tr>
                            <tr>
                                <td>DIRECTX hỗ trợ</td>
                                <td>12 API</td>
                            </tr>
                            <tr>
                                <td>OPENGL hỗ trợ</td>
                                <td>4.6</td>
                            </tr>
                            <tr>
                                <td>Độ ph&acirc;n giải tối đa</td>
                                <td>7680x4320</td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <h2><strong>Đ&aacute;nh gi&aacute; Card m&agrave;n h&igrave;nh Gigabyte RTX 3060 GAMING OC 12GD-V3 ch&iacute;nh h&atilde;ng, bảo h&agrave;nh d&agrave;i</strong></h2>

                    <p><strong>Card m&agrave;n h&igrave;nh Gigabyte RTX 3060 GAMING OC 12GD-V2</strong>&nbsp;l&agrave; d&ograve;ng card đồ họa tầm trung của Gigabyte d&agrave;nh cho nhu cầu chơi game ở độ ph&acirc;n giải 2K&nbsp;</p>

                    <p>*Đ&acirc;y l&agrave; phi&ecirc;n bản Low Hash Rate - Hạn chế khả năng đ&agrave;o coin tuy nhi&ecirc;n hiệu năng chơi game vẫn giữ nguy&ecirc;n như phi&ecirc;n bản thường.</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F59997_card_man_hinh_gigabyte_rtx_3060_gaming_oc_12gd_v2-1.jpg?alt=media&token=978af93b-10b9-4ed3-b733-2f83138440d3" width="2048" />
                    <figcaption></figcaption>
                    </figure>

                    <h3>Hiệu năng của Card m&agrave;n h&igrave;nh Gigabyte RTX 3060 GAMING OC 12GD-V2</h3>

                    <p>Được trang bị nh&acirc;n đồ họa Nvidia&nbsp;<a href="https://hacom.vn/nvidia-rtx-3060" rel="noopener" target="_blank">RTX 3060</a>, Card m&agrave;n h&igrave;nh Gigabyte RTX 3060 GAMING OC 12GD-V2 c&oacute; hiệu năng tốt hơn RTX 2060 v&agrave; chơi tốt tất cả những game khủng hiện nay ở độ ph&acirc;n giải 2K v&agrave; setting đặt ở mức cao.&nbsp;</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F59997_card_man_hinh_gigabyte_rtx_3060_gaming_oc_12gd_v2-2.jpg?alt=media&token=9dce951a-57d1-4503-be2c-bed73a1408a3" width="1218" />
                    <figcaption></figcaption>
                    </figure>

                    <h3>C&ocirc;ng nghệ l&agrave;m m&aacute;t tr&ecirc;n Card m&agrave;n h&igrave;nh Gigabyte RTX 3060 GAMING OC 12GD-V2</h3>

                    <ul>
                        <li><strong>Windforce 3X:&nbsp;</strong></li>
                    </ul>

                    <p>Trang bị 3 quạt k&iacute;ch thước lớn với c&aacute;c quạt được thiết kế đặc biệt để tạo ra lượng gi&oacute; nhiều hơn</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F59997_card_man_hinh_gigabyte_rtx_3060_gaming_oc_12gd_v2-3.jpg?alt=media&token=07d1d4bf-bb15-4a18-a0d3-7b9c554ee033" width="2048" />
                    <figcaption></figcaption>
                    </figure>

                    <ul>
                        <li><strong>C&aacute;nh quạt trung t&acirc;m quay ngược chiều</strong></li>
                    </ul>

                    <p>Tăng &aacute;p lực gi&oacute; để l&agrave;m m&aacute;t đều to&agrave;n bộ bề mặt heatsink ph&iacute;a dưới</p>

                    <h3>Hệ thống đ&egrave;n LED RGB</h3>

                    <p>Sử dụng hệ thống RGB Fusion 2.0 để điều khiển hệ thống đ&egrave;n RGB tr&ecirc;n th&acirc;n VGA với h&agrave;ng ng&agrave;n hiệu ứng v&agrave; m&agrave;u sắc kh&aacute;c nhau.&nbsp;</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F59997_card_man_hinh_gigabyte_rtx_3060_gaming_oc_12gd_v2-4.jpg?alt=media&token=3c318114-3901-4a63-adb7-650d976d64b9" width="2048" />
                    <figcaption></figcaption>
                    </figure>

                    <h3>Backplate kim loại</h3>

                    <p>Gi&uacute;p bảo vệ tốt hơn trước c&aacute;c t&aacute;c động vật l&yacute; kh&ocirc;ng đ&aacute;ng c&oacute;</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F59997_card_man_hinh_gigabyte_rtx_3060_gaming_oc_12gd_v2-5.jpg?alt=media&token=908be2e9-e352-493f-9a00-3e77aea64728" width="2048" />
                    <figcaption></figcaption>
                    </figure>

                    <h3>Linh kiện bền bỉ</h3>

                    <p>Sử dụng c&aacute;c th&agrave;nh phần linh kiện được chọn lọc, bền bỉ gi&uacute;p card c&oacute; khả năng overclock tốt hơn v&agrave; bền bỉ hơn.&nbsp;</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2F59997_card_man_hinh_gigabyte_rtx_3060_gaming_oc_12gd_v2-6.jpg?alt=media&token=e30459ac-5aff-4aa9-a4db-dbe6eed9c046" width="2048" />
                    <figcaption></figcaption>
                    </figure>

                    <p>&nbsp;</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Fcard_man_hinh_gigabyte_rtx_3060_gaming_oc_12gd_v2_1.jpg?alt=media&token=c08cd558-ff9f-42c8-a89f-e56e1908b825',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 29,
                'name' => 'Card màn hình Gigabyte RTX 3060 Ti',
                'slug' => Str::slug('Card màn hình Gigabyte RTX 3060 Ti GAMING OC-8GD-V2'),
                'name_full' => 'Card màn hình Gigabyte RTX 3060 Ti GAMING OC-8GD-V2',
                'category_id' => 2,
                'price' => 15999000,
                'sale' => 10,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Th&ocirc;ng số kỹ thuật chi tiết Card m&agrave;n h&igrave;nh Gigabyte RTX 3060 Ti GAMING OC-8GD-V2</strong></h2>
                    <table style="width:980px">
                        <tbody>
                            <tr>
                                <td>Sản ph&acirc;̉m</td>
                                <td>VGA - Cạc đ&ocirc;̀ họa</td>
                            </tr>
                            <tr>
                                <td>T&ecirc;n Hãng</td>
                                <td>GIGABYTE</td>
                            </tr>
                            <tr>
                                <td>Model</td>
                                <td>RTX 3060 Ti GAMING OC-8GD-V2</td>
                            </tr>
                            <tr>
                                <td>Engine đồ họa</td>
                                <td>NVIDIA&reg; GeForce RTX&trade;3060 Ti</td>
                            </tr>
                            <tr>
                                <td>Bộ nhớ trong</td>
                                <td>8GB</td>
                            </tr>
                            <tr>
                                <td>Kiểu bộ nhớ</td>
                                <td>GDDR6</td>
                            </tr>
                            <tr>
                                <td>Bus</td>
                                <td>256-Bit</td>
                            </tr>
                            <tr>
                                <td>Core Clock</td>
                                <td>1740 MHz (Reference Card: 1665MHz)</td>
                            </tr>
                            <tr>
                                <td>Cuda Cores</td>
                                <td>4864</td>
                            </tr>
                            <tr>
                                <td>Memory Speed</td>
                                <td>1400 MHz</td>
                            </tr>
                            <tr>
                                <td>Chuẩn khe cắm</td>
                                <td>PCI Express 4.0 x 16</td>
                            </tr>
                            <tr>
                                <td>Độ ph&acirc;n giải</td>
                                <td>Digital Max Resolution 7680 x 4320</td>
                            </tr>
                            <tr>
                                <td>Cổng giao tiếp</td>
                                <td>Yes&nbsp;x&nbsp;2&nbsp;(Native&nbsp;HDMI 2.1)Yes&nbsp;x&nbsp;2&nbsp;(Native&nbsp;DisplayPort 1.4a)</td>
                            </tr>
                            <tr>
                                <td>C&ocirc;ng suất nguồn y&ecirc;u cầu</td>
                                <td>600W</td>
                            </tr>
                            <tr>
                                <td>Đầu nối nguồn</td>
                                <td>1 x 8-pin</td>
                            </tr>
                            <tr>
                                <td>K&iacute;ch thước</td>
                                <td>28.2 x 11.7 x 4.1 Centimeter</td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <h2><strong>Đ&aacute;nh gi&aacute; Card m&agrave;n h&igrave;nh Gigabyte RTX 3060 Ti GAMING OC-8GD-V2 ch&iacute;nh h&atilde;ng, bảo h&agrave;nh d&agrave;i hạn</strong></h2>

                    <h3><a href="https://hacom.vn/vga-card-man-hinh">Card m&agrave;n h&igrave;nh</a>&nbsp;Gigabyte RTX 3060 Ti GAMING OC-8GD-V2</h3>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcard-man-hinh-gigabyte-rtx-3060-ti-gaming-oc-8gd-v2-cv-1.jpg?alt=media&token=73f411bc-8b71-4ef1-a25f-b7644d06254a" width="1361" />
                    <figcaption></figcaption>
                    </figure>

                    <p>&nbsp;</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Fcard_man_hinh_gigabyte_rtx_3060_ti_gaming_oc_pro_8gd_v2_13.jpeg?alt=media&token=d0009c48-8379-425f-aff6-82b550a0dc92',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 30,
                'name' => 'Card màn hình Gigabyte RTX 3070',
                'slug' => Str::slug('Card màn hình Gigabyte RTX 3070 GAMING OC 8GD-V2'),
                'name_full' => 'Card màn hình Gigabyte RTX 3070 GAMING OC 8GD-V2',
                'category_id' => 2,
                'price' => 16999000,
                'sale' => 5,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Th&ocirc;ng số kỹ thuật chi tiết Card m&agrave;n h&igrave;nh Gigabyte RTX 3070 GAMING OC 8GD-V2</strong></h2>
                    <table style="width:980px">
                        <tbody>
                            <tr>
                                <td>Sản phẩm</td>
                                <td>Card đồ họa VGA</td>
                            </tr>
                            <tr>
                                <td>H&atilde;ng sản xuất</td>
                                <td>GIGA</td>
                            </tr>
                            <tr>
                                <td>Model</td>
                                <td>RTX 3070 GAMING OC 8GD-V2</td>
                            </tr>
                            <tr>
                                <td>Engine đồ họa</td>
                                <td>NVIDIA&reg; RTX 3070&trade;</td>
                            </tr>
                            <tr>
                                <td>Chuẩn Bus</td>
                                <td>PCI Express 4.0 x 16</td>
                            </tr>
                            <tr>
                                <td>Memory Clock</td>
                                <td>14 Gbps</td>
                            </tr>
                            <tr>
                                <td>Bộ nhớ</td>
                                <td>8GB GDDR6</td>
                            </tr>
                            <tr>
                                <td>Bus bộ nhớ</td>
                                <td>256-bit</td>
                            </tr>
                            <tr>
                                <td>CUDA Cores</td>
                                <td>&nbsp;5888</td>
                            </tr>
                            <tr>
                                <td>Core Clock</td>
                                <td>1815 MHz (Reference Card: 1725 MHz)</td>
                            </tr>
                            <tr>
                                <td>Cổng xuất h&igrave;nh</td>
                                <td>HDMI 2.1 x 2<br />
                                Display Port x2 (v1.4a)</td>
                            </tr>
                            <tr>
                                <td>C&ocirc;ng suất nguồn y&ecirc;u cầu</td>
                                <td>Từ 650W</td>
                            </tr>
                            <tr>
                                <td>Kết nối nguồn&nbsp;</td>
                                <td>1 x 8-pin, 1 x 6-pin</td>
                            </tr>
                            <tr>
                                <td>K&iacute;ch thước (DxRxC)&nbsp;</td>
                                <td>28.6 x 11.5 x 5.1 centimeter</td>
                            </tr>
                            <tr>
                                <td>DIRECTX hỗ trợ</td>
                                <td>12 API</td>
                            </tr>
                            <tr>
                                <td>OPENGL hỗ trợ</td>
                                <td>4.6</td>
                            </tr>
                            <tr>
                                <td>Độ ph&acirc;n giải tối đa</td>
                                <td>7680x4320</td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <h2><strong>Đ&aacute;nh gi&aacute; Card m&agrave;n h&igrave;nh Gigabyte RTX 3070 GAMING OC 8GD-V3 ch&iacute;nh h&atilde;ng, bảo h&agrave;nh d&agrave;i</strong></h2>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcard-man-hinh-gigabyte-rtx-3070-gaming-oc-8gd-v2-1.jpg?alt=media&token=2d8f24c1-c2cb-4029-ac3c-21479d379fec" width="1361" />
                    <figcaption></figcaption>
                    </figure>

                    <p><strong>Card m&agrave;n h&igrave;nh Gigabyte RTX 3070 GAMING OC - 8GD</strong>&nbsp;l&agrave; một trong những sản phẩm cao cấp nhất của Gigabyte phục vụ cho nhu cầu gaming ở độ ph&acirc;n giải 4K. Đ&acirc;y l&agrave;&nbsp;<a href="https://hacom.vn/vga-card-man-hinh" rel="noopener" target="_blank" title="card đồ họa">card đồ họa</a>&nbsp;sử dụng kiến tr&uacute;c Ampare ho&agrave;n to&agrave;n mới c&ugrave;ng nh&acirc;n RT thế hệ 2, nh&acirc;n Tensor thế hệ 3, Nvidia RTX IO, VRAM GDDR6 v&agrave; sản xuất tr&ecirc;n tiến tr&igrave;nh 8nm được Samsung l&agrave;m ri&ecirc;ng.&nbsp;</p>

                    <p>*Đ&acirc;y l&agrave; phi&ecirc;n bản Low Hash Rate (LHR) bị giới hạn khả năng đ&agrave;o coin, d&agrave;nh ri&ecirc;ng cho đối tượng game thủ</p>

                    <h3><strong>Thiết kế tối ưu hệ thống l&agrave;m m&aacute;t</strong></h3>

                    <p>Từ tr&ecirc;n xuống dưới, Card m&agrave;n h&igrave;nh Gigabyte RTX 3070 GAMING OC - 8GD đ&atilde; được cải tiến ho&agrave;n to&agrave;n để ph&ugrave; hợp với nền tảng Ampere ho&agrave;n to&agrave;n mới từ NVIDIA để mang đến&nbsp; hiệu suất chơi game vượt trội so với thế hệ trước. D&ograve;ng card đồ họa n&agrave;y mang một thiết kế mới v&agrave; nhiều kim loại hơn bao quanh 3 quạt l&agrave;m m&aacute;t với c&ocirc;ng nghệ 3x. C&aacute;ch bố tr&iacute; tất cả c&aacute;c quạt xoay c&ugrave;ng 1 hướng đ&atilde; lỗi thời, ở thế hệ mới nhất 3 quạt tr&ecirc;n d&ograve;ng card đồ họa Eagle được ph&acirc;n l&agrave;m 2 nhiệm vụ quạt ch&iacute;nh v&agrave; phụ trợ quay đảo chiều nhau đem lại hiệu suất tốt hơn hẳn. B&ecirc;n dưới c&aacute;c c&aacute;nh quạt, một bộ tản nhiệt lớn hơn, ấn tượng hơn đ&atilde; sẵn s&agrave;ng cho c&aacute;c mức nhiệt độ &quot;khủng&quot; nhất.&nbsp;</p>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcard-man-hinh-gigabyte-rtx-3060-ti-gaming-oc-8gd-v2-cv-2.jpg?alt=media&token=b770e00d-59a2-410e-9bbe-a1a2692dbed4" width="1392" />
                    <figcaption></figcaption>
                    </figure>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcard-man-hinh-gigabyte-rtx-3060-ti-gaming-oc-8gd-v2-cv-3.jpg?alt=media&token=28920f8b-916d-4a76-b638-2937140d8563" width="1403" />
                    <figcaption></figcaption>
                    </figure>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcard-man-hinh-gigabyte-rtx-3060-ti-gaming-oc-8gd-v2-cv-4.jpg?alt=media&token=f3acde32-7cef-41a5-b414-d6f07ea563ad" width="1364" />
                    <figcaption></figcaption>
                    </figure>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcard-man-hinh-gigabyte-rtx-3060-ti-gaming-oc-8gd-v2-cv-5.jpg?alt=media&token=09f6b73c-89c8-476e-9185-ebe4893fda49" width="2560" />
                    <figcaption></figcaption>
                    </figure>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcard-man-hinh-gigabyte-rtx-3060-ti-gaming-oc-8gd-v2-cv-6.jpg?alt=media&token=224b9d2e-262f-4943-9334-53d6b246fec6" width="1000" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Linh kiện cao cấp, được ho&agrave;n thiện tinh xảo</strong></h3>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcard-man-hinh-gigabyte-rtx-3060-ti-gaming-oc-8gd-v2-cv-7.jpg?alt=media&token=c234c220-ca4b-4a05-925a-1400d24c0264" width="1100" />
                    <figcaption></figcaption>
                    </figure>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcard-man-hinh-gigabyte-rtx-3060-ti-gaming-oc-8gd-v2-cv-8.jpg?alt=media&token=b1480209-e358-4ced-b670-bc6fc006e9cf" width="937" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>C&aacute; nh&acirc;n h&oacute;a với RGB Fusion 2.0</strong></h3>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcard-man-hinh-gigabyte-rtx-3060-ti-gaming-oc-8gd-v2-cv-9.jpg?alt=media&token=9237fb38-6161-444a-bc3b-ecdc8bd58583" width="1403" />
                    <figcaption></figcaption>
                    </figure>

                    <p>&nbsp;</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Fcard_man_hinh_gigabyte_rtx_3070_gaming_oc_8gd_v2_1.jpg?alt=media&token=56447c26-e316-4e1d-bc6f-cc91084de833',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 31,
                'name' => 'Card màn hình Gigabyte RTX 4070 Ti',
                'slug' => Str::slug('Card màn hình Gigabyte RTX 4070 Ti GAMING OC 12GB'),
                'name_full' => 'Card màn hình Gigabyte RTX 4070 Ti GAMING OC 12GB',
                'category_id' => 2,
                'price' => 29999000,
                'sale' => 5,
                'status' => 'active',
                'hot' => 'no',
                'content' => '
                    <h2><strong>Th&ocirc;ng số kỹ thuật chi tiết Card m&agrave;n h&igrave;nh Gigabyte RTX 4070 Ti GAMING OC 12GB</strong></h2>
                    <table style="width:674px">
                        <tbody>
                            <tr>
                                <td>Sản ph&acirc;̉m</td>
                                <td>VGA - Cạc đ&ocirc;̀ họa</td>
                            </tr>
                            <tr>
                                <td>T&ecirc;n Hãng</td>
                                <td>GIGABYTE</td>
                            </tr>
                            <tr>
                                <td>Model</td>
                                <td>RTX 4070 Ti GAMING OC 12GB</td>
                            </tr>
                            <tr>
                                <td>Engine đồ họa</td>
                                <td>NVIDIA&reg; GeForce RTX&trade;4070Ti</td>
                            </tr>
                            <tr>
                                <td>Chuẩn khe cắm</td>
                                <td>PCI Express 4.0</td>
                            </tr>
                            <tr>
                                <td>DirectX</td>
                                <td>12 Ultimate</td>
                            </tr>
                            <tr>
                                <td>Open</td>
                                <td>GL4.6</td>
                            </tr>
                            <tr>
                                <td>Bộ nhớ trong</td>
                                <td>12GB</td>
                            </tr>
                            <tr>
                                <td>Kiểu bộ nhớ</td>
                                <td>GDDR6X</td>
                            </tr>
                            <tr>
                                <td>Bus</td>
                                <td>192-Bit</td>
                            </tr>
                            <tr>
                                <td>Core Clock</td>
                                <td>2640 MHz (Reference card : 2610 MHz)</td>
                            </tr>
                            <tr>
                                <td>Cuda Cores</td>
                                <td>7680</td>
                            </tr>
                            <tr>
                                <td>Độ ph&acirc;n giải</td>
                                <td>Digital Max Resolution 7680 x 4320</td>
                            </tr>
                            <tr>
                                <td>Hỗ trợ m&agrave;n h&igrave;nh</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>Hỗ trợ Nvlink</td>
                                <td>Kh&ocirc;ng</td>
                            </tr>
                            <tr>
                                <td>Cổng giao tiếp</td>
                                <td>HDMI 2.1 x 1<br />
                                DisplayPort 1.4 x 3</td>
                            </tr>
                            <tr>
                                <td>K&iacute;ch thước</td>
                                <td>33.6 x 14.0 x 5.8 Centimeter</td>
                            </tr>
                            <tr>
                                <td>C&ocirc;ng suất nguồn y&ecirc;u cầu</td>
                                <td>750W</td>
                            </tr>
                            <tr>
                                <td>Đầu nối nguồn</td>
                                <td>1 x 16-pin</td>
                            </tr>
                        </tbody>
                    </table>

                    <p>&nbsp;</p>

                    <h2><strong>Đ&aacute;nh gi&aacute; Card m&agrave;n h&igrave;nh Gigabyte RTX 4070 Ti GAMING OC 12GB</strong></h2>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcard-man-hinh-gigabyte-rtx-4070-ti-gaming-oc-12gb-cv-1.jpg?alt=media&token=54c078b3-1188-468c-82e6-7e8eb41305e8" width="1912" />
                    <figcaption></figcaption>
                    </figure>

                    <h3><strong>Hiệu năng RTX 4070 Ti</strong></h3>

                    <figure class="easyimage easyimage-full"><img alt="" src="https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-infor-product%2Fcard-man-hinh-gigabyte-rtx-4070-ti-gaming-oc-12gb-cv-2.jpg?alt=media&token=9667162c-415b-45cd-8dfd-735aef559d8c" width="1071" />
                    <figcaption></figcaption>
                    </figure>

                    <p>&nbsp;</p>
                ',
                'image' => 'https://firebasestorage.googleapis.com/v0/b/kltn-1dd42.appspot.com/o/image-product%2Fcard_man_hinh_gigabyte_rtx_4070_ti_gaming_oc_12gb__3_.jpg?alt=media&token=3bf41925-2b59-4edb-8720-070dcf8e1dbf',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
