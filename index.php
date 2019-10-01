<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ตารางเวรศูนย์คอมพิวเตอร์</title>
    <link rel="stylesheet" type="text/css" href="dist/css/style-me.css">
    <script src="dist/js/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    function DateTimeThaiNew($strDate)
    {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strMonthCut = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strMonthThai $strYear";
    }
    ?>
    <div id="">
        <div class="intro">
            <hgroup>
                <h4>ตารางเวรบ่ายศูนย์คอมพิวเตอร์</h4>
                <h3><?php echo "ประจำเดือน " . DateTimeThaiNew(date('Y-m-d')); ?></h3>
            </hgroup>
        </div>
        <div id="showData">
        </div>
    </div>
    <script>
        function formateDateTH(dateTime) {
            let toTwoDigits = num => (num < 10 ? "0" + num : num);
            let date = dateTime.split("-");
            let day = parseInt(date[2]);
            let month = date[1];
            let strMonthCut = ["", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];
            let year = parseInt(date[0]) + 543;
            let createdDate = day + " " + strMonthCut[month] + " " + year;
            //console.log(createdDate);

            return createdDate;
        }

        $(document).ready(function() {
            const toTwoDigits = num => (num < 10 ? "0" + num : num);
            let today = new Date();
            let year = today.getFullYear();
            let year_TH = parseInt(today.getFullYear()) + 543;
            let month = toTwoDigits(today.getMonth() + 1);
            let day = toTwoDigits(today.getDate());
            let date_now = `${year}-${month}-${day}`;
            $.ajax({
                url: "models/getData.php",
                method: "POST",
                data: "id=0",
                beforeSend: function() {

                },
                success: function(data) {
                    let decode = JSON.parse(data);
                    //console.log(decode.dataParse);
                    let dataParse = decode.dataParse
                    let result = '<table>'
                    result += '<thead>'
                    result += '<tr>'
                    result += '<th><div class="heading">วันที่</div></th>'
                    result += '<th><div class="heading">โปรแกรมเมอร์</div></th>'
                    result += '<th><div class="heading">ช่างเทคนิค</div></th>'
                    result += '</tr>'
                    result += '</thead>'
                    result += '<tbody id="plan">'
                    for (let i = 0; i < decode.dataParse.length; i++) {
                        let active = (date_now == dataParse[i].date_time) ? "active" : "";
                        result += '<tr>'
                        result += '<td class="' + active + '">' + formateDateTH(dataParse[i].date_time) + '</td>'
                        result += '<td class="' + active + '">' + dataParse[i].name_admin + '</td>'
                        result += '<td class="' + active + '">' + dataParse[i].name_tech + '</td>'
                        result += '</tr>'
                    }
                    result += '</tbody>'
                    result += '</table>'
                    $('#showData').html(result);
                },
                error: function() {

                }
            });
        });
    </script>
</body>

</html>