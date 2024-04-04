<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อนุมัติคำขอจองห้อง</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="image" href="C:\xampp\htdocs\test_table\public\storage">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ url('dist/css/bootstrap.min.css') }}">
    <script src="{{ url('dist/js/bootstrap.min.js') }}"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Noto+Sans+Thai:wght@100..900&display=swap"
        rel="stylesheet">
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.2.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <style>
        th,
        td {
            vertical-align: middle;
        }

        .header {
            background-image: url("{{ asset('storage/images/Rectangle 53 (1).png') }}");
            background-color: #0077b6;
            color: white;
            padding: 10px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }

        .table-container {
            border: 1px solid #fcfdff;
            border-radius: 5px;
            padding: 20px;
            margin-top: 10px;
            margin-left: 80px;
            /* เปลี่ยนจากเดิม 20px เป็น 10px */
            max-height: 500px;
            /* จัดให้ตารางอยู่กึ่งกลาง */
            max-width: 1000px;
            /* กำหนดความกว้างสูงสุดของตาราง */
            overflow-x: auto; /* เพิ่มคำสั่งนี้เพื่อให้สามารถเลื่อนดูตารางได้หากเนื้อที่ไม่พอ */
        }

        table {
            border-spacing: 1;
            border-collapse: collapse;
            background: white;
            border-radius: 6px;
            overflow: hidden;
            max-width: 100%;
            width: 100%;
            margin: 0 auto;
            position: relative;

            * {
                position: relative
            }

            td,
            th {
                padding-left: 8px
            }

            thead tr {
                height: 60px;
                background: #dededd;
                font-size: 16px;
            }

            tbody tr {
                height: 48px;
                border-bottom: 1px solid #E3F1D5;

                &:last-child {
                    border: 0;
                }
            }

            td,
            th {
                text-align: left;

                &.l {
                    text-align: right
                }

                &.c {
                    text-align: center
                }

                &.r {
                    text-align: center
                }
            }
        }


        @media #{$gl-xs} {

            table {
                display: block;

                >*,
                tr,
                td,
                th {
                    display: block
                }

                thead {
                    display: none
                }

                tbody tr {
                    height: auto;
                    padding: 8px 0;

                    td {
                        padding-left: 45%;
                        margin-bottom: 12px;

                        &:last-child {
                            margin-bottom: 0
                        }

                        &:before {
                            position: absolute;
                            font-weight: 700;
                            width: 40%;
                            left: 10px;
                            top: 0
                        }

                        &:nth-child(1):before {
                            content: "Code";
                        }

                        &:nth-child(2):before {
                            content: "Stock";
                        }

                        &:nth-child(3):before {
                            content: "Cap";
                        }

                        &:nth-child(4):before {
                            content: "Inch";
                        }

                        &:nth-child(5):before {
                            content: "Box Type";
                        }
                    }
                }
            }
        }




        // body style

        html,
        body {
            background: #ff6347;
            /* สีอิฐสีอ่อน */
            /* หรือ background: #008000; สำหรับสีเขียว */
            font: 400 14px 'Calibri', 'Arial';
            padding: 0;
            height: 100%;
            margin: 0;
        }


        blockquote {
            color: white;
            text-align: center;
        }

        //
        .swal-actions-styled {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .swal-actions-styled button {
            margin-left: 10px;
        }

        //sidebar
        .navbar-nav .active {
            color: red;
        }

        //button
    </style>
</head>

<body style="background-color: #e3e2e2;">
    <div class="row m-0" style="height: 10vh;">
        <!-- Sidebar -->
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white"
            style="width: 350; height: 100vh; background-color: #242038">
            <!-- Sidebar content here -->
            <a href="/"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto mx-auto text-white text-decoration-none">
                <img src="logo_bmrs.jpg" class="img-fluid" alt="" width="73px" height="65.39px"
                    style="border-radius: 15px" />
                <span class="fs-5 lh-sm ms-3">ระบบจองห้องประชุม<br>หน่วยงานราชการ</span>
            </a>
            <hr class="invisible">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="d-flex nav-link active align-items-center" aria-current="booking room">
                        <i class="fi fi-sr-meeting-alt me-2" style="font-size: 30px"></i>
                        จองห้องประชุม
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="d-flex nav-link text-white align-items-center" aria-current="track status">
                        <i class="fi fi-sr-time-past me-2" style="font-size: 30px"></i>
                        ติดตามสถานะการจอง
                    </a>
                </li>
            </ul>
            <hr>
            <div class="d-flex align-items-center justify-content-between">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none"
                    aria-expanded="false">
                    <img src="https://media.discordapp.net/attachments/1209200207963758673/1224255943861080064/a8a6659eb448af110e0eb9cfb83e901d.png?ex=661cd432&is=660a5f32&hm=a4a235e24939438515f682e285e9e1fe9d10fb1ea91b0bf873690fee774c090b&=&format=webp&quality=lossless&width=628&height=585"
                        alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong><u>เจ้าหน้าที่</u></strong>
                </a>
                <a href="{{ url('/') }}" class="nav-link text-white"><i class="fi fi-sr-sign-out-alt"
                        style="font-size: 30"></i></a>
            </div>
        </div>
        <div class="d-flex flex-column flex-grow-1">
            {{-- navbar --}}
            <div class="d-flex bg-dark text-white align-items-center p-4 fs-3"
                style="width: 80vw; height: 10%; background-image: linear-gradient(to right ,#1E1450 ,#1E3ACC); border-radius: 18px;">
                <i class="fi fi-sr-meeting-alt me-4" style="font-size: 45px;"></i>
                จองห้องประชุม
            </div>
        </div>
    </div>
    <div class="col-md-9 p-0 flex-grow-1 mx-auto">
        <div class="container-fluid h-100">
            <div class="mt-3">
                <div class="table-container" style="background-color: #ffffff;">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อผู้จอง</th>
                                <th>ชื่อห้อง</th>
                                <th>วันที่เข้าใช้</th>
                                <th>วันที่สิ้นสุด</th>
                                <th>เวลาเข้าใช้</th>
                                <th>เวลาสิ้นสุด</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $booking->user_name }}</td>
                                    <td>{{ $booking->room_name }}</td>
                                    <td>{{ date('d/m/Y', strtotime($booking->start_date)) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($booking->end_date)) }}</td>
                                    <td>{{ date('H:i', strtotime($booking->start_time)) }}</td>
                                    <td>{{ date('H:i', strtotime($booking->end_time)) }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-success btn-custom"
                                            onclick="showSuccessAlert({{ $booking->id }})">✓</button>
                                        <button class="btn btn-sm btn-danger btn-custom"
                                            onclick="showCancel({{ $booking->id }})">✗</button>
                                        <button class="btn btn-sm btn-primary btn-custom"
                                            onclick="showDetail({{ $booking->id }})">รายละเอียด</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<script>
    function showSuccessAlert() {
        Swal.fire({
            title: 'ยืนยันการจอง',
            html: '<div style="display: flex; align-items: center;">' +
                '<div style="flex: 1;">' +
                '<img src="https://www.ananda.co.th/blog/thegenc/wp-content/uploads/2023/09/business-meeting-working-room-office-building-FI.jpg" style="max-width: 300px;">' +
                '<p style="margin-top: 10px;">ห้อง Gt-200</p>' +
                '</div>' +
                '<div style="flex: 1; margin-left: 20px;">' +
                '<p>ชื่อผู้จอง: ภาณุวิชญ์ จันทร์กลาง</p>' +
                '<p>วันที่จอง: 03/04/2024</p>' +
                '<p>วันที่ใช้ห้อง: 03/04/2024</p>' +
                '<p>ถึงวันที่: 04/04/2024</p>' +
                '<p>เวลา: 10:58-11:58 น.</p>' +
                '<p>ขนาดของห้อง: เต็มห้อง</p>' +
                '</div>' +
                '</div>',
            width: '80%',
            showCancelButton: true,
            confirmButtonText: 'ยืนยันการอนุมัติ',
            cancelButtonText: 'ยกเลิก',
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#9B9B9B',
            customClass: {
                actions: 'swal-actions-styled' // ใส่ class สำหรับปรับแต่งตำแหน่งปุ่ม
            }
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'อนุมัติสำเร็จ',
                    text: 'คำขอจองห้องได้รับการอนุมัติแล้ว',
                    icon: 'success',
                    width: '50%' // กำหนดความกว้างเป็น 50% ของหน้าจอ
                })
            }
        })
    }
    //
    function showCancel() {
        Swal.fire({
            title: 'ยกเลิกการจอง',
            html: '<div style="display: flex; align-items: center;">' +
                '<div style="flex: 1;">' +
                '<img src="https://www.ananda.co.th/blog/thegenc/wp-content/uploads/2023/09/business-meeting-working-room-office-building-FI.jpg" style="max-width: 300px;">' +
                '<p style="margin-top: 10px;">ห้อง G108</p>' +
                '</div>' +
                '<div style="flex: 1; margin-left: 20px;">' +
                '<p>ชื่อผู้จอง: นายกรณ์ พรหมนิเกตร</p>' +
                '<p>วันที่จอง: 19/02/2567</p>' +
                '<p>วันที่ใช้ห้อง: 21/02/2567</p>' +
                '<p>ถึงวันที่: 22/02/2567</p>' +
                '<p>เวลา: 13.00-17.00 น.</p>' +
                '<p>ขนาดของห้อง: เต็มห้อง</p>' +
                '</div>' +
                '</div>' +
                '<p>เหตุผลในการยกเลิก:</p>' +
                '<textarea class="form-control" id="reason" rows="3" style="width: 100%;"></textarea>',
            width: '80%',
            showCancelButton: true,
            confirmButtonText: 'ยืนยันการยกเลิก',
            cancelButtonText: 'ยกเลิก',
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#28a745',
            customClass: {
                actions: 'swal-actions-styled'
            },
            preConfirm: () => {
                const reason = Swal.getPopup().querySelector('#reason').value;
                if (!reason) {
                    Swal.showValidationMessage('กรุณาระบุเหตุผลในการยกเลิก');
                    return true;
                }
                return Swal.fire({
                    title: 'ยืนยันการยกเลิก',
                    text: 'คุณแน่ใจหรือไม่ว่าต้องการยกเลิกการจองนี้?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                    if (result.isConfirmed) {
                        return {
                            reason
                        };
                    } else {
                        return false;
                    }
                });
            }
        }).then((result) => {
            if (result.value && result.value.reason) {
                Swal.fire({
                    title: 'ยกเลิกการจองสำเร็จ',
                    text: `เหตุผล: ${result.value.reason}`,
                    icon: 'success',
                    width: '50%'
                });
            }
        });
    }
    //
    function showDetail() {
        Swal.fire({
            title: 'รายละเอียดการจอง',
            html: '<div style="display: flex; align-items: center;">' +
                '<div style="flex: 1;">' +
                '<img src="https://www.ananda.co.th/blog/thegenc/wp-content/uploads/2023/09/business-meeting-working-room-office-building-FI.jpg" style="max-width: 300px;">' +
                '<p style="margin-top: 10px;">ห้อง G108</p>' +
                '</div>' +
                '<div style="flex: 1; margin-left: 20px;">' +
                '<p>ชื่อผู้จอง: นายกรณ์ พรหมนิเกตร</p>' +
                '<p>วันที่เข้าใช้: 18/02/2567</p>' +
                '<p>วันที่สิ้นสุด: 18/02/2567</p>' +
                '<p>เวลาเข้าใช้: 10.00</p>' +
                '<p>เวลาสิ้นสุด: 15.00</p>' +
                '</div>' +
                '</div>',
            width: '70%', // กำหนดความกว้างเป็น 80% ของหน้าจอ
            confirmButtonText: 'ปิด',
        })
    }
</script>

</html>
