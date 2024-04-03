<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อนุมัติคำขอจองห้อง</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="image" href="C:\xampp\htdocs\test_table\public\storage">
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
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
            max-height: 500px;
            /* กำหนดความสูงสูงสุดของคอนเทนเนอร์ */
            overflow-y: auto;
            /* เพิ่มแถบเลื่อนด้านข้างเมื่อเนื้อหาเกินความสูงที่กำหนด */
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
                background: #c7c7c3;
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

        body {
            background: #9BC86A;
            font: 400 14px 'Calibri', 'Arial';
            padding: 20px;
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
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="header d-flex align-items-center">
            <img src="{{ asset('storage/images/checkbox1.png') }}" alt="Logo" style="max-height: 40px; margin-right: 10px;">
            <h2 class="mb-0">อนุมัติคำขอจองห้อง</h2>
        </div>
        <div class="table-container">
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
                        <th>อนุมัติ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $booking->user_name }}</td>
                            <td>{{ $booking->room_name }}</td>
                            <td>{{ date('m-d-Y', strtotime($booking->start_date)) }}</td>
                            <td>{{ date('m-d-Y', strtotime($booking->end_date)) }}</td>
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
