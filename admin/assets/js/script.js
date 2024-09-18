
$("#unActiveAll").click(function (e){
    // Ngăn chặn form được gửi đi
    e.preventDefault();
    $('.sweet-overlay').removeClass('hide');
    $text = $(this).text();
    $('p#title-text').text($text);
    //Lấy giá trị của thuộc tính name của button có id=unActiveAll
    $name = $(this).attr("name");
    //thục hiện gán giá trị của biến name vừa lấy vào thuộc tính name của button có id=submit
    $('button#submit').attr("name",$name);
});

$("#activeAll").click(function (e){
    // Ngăn chặn form được gửi đi
    e.preventDefault();
    $('.sweet-overlay').removeClass('hide');
    $text = $(this).text();
    $('p#title-text').text($text);
    //Lấy giá trị của thuộc tính name của button có id=unActiveAll
    $name = $(this).attr("name");
    //thục hiện gán giá trị của biến name vừa lấy vào thuộc tính name của button có id=submit
    $('button#submit').attr("name",$name);
});

$("#deleteNV").click(function (e){
    // Ngăn chặn form được gửi đi
    e.preventDefault();
    $('.sweet-overlay').removeClass('hide');
    $text = $(this).text();
    $('p#title-text').text($text);
    //Lấy giá trị của thuộc tính name của button có id=unActiveAll
    $name = $(this).attr("name");
    //thục hiện gán giá trị của biến name vừa lấy vào thuộc tính name của button có id=submit
    $('button#submit').attr("name",$name);
});

$("#deletePlayer").click(function (e){
    // Ngăn chặn form được gửi đi
    e.preventDefault();
    $('.sweet-overlay').removeClass('hide');
    $text = $(this).text();
    $('p#title-text').text($text);
    //Lấy giá trị của thuộc tính name của button có id=unActiveAll
    $name = $(this).attr("name");
    //thục hiện gán giá trị của biến name vừa lấy vào thuộc tính name của button có id=submit
    $('button#submit').attr("name",$name);
});
$("#deleteTk").click(function (e){
    // Ngăn chặn form được gửi đi
    e.preventDefault();
    $('.sweet-overlay').removeClass('hide');
    $text = $(this).text();
    $('p#title-text').text($text);
    //Lấy giá trị của thuộc tính name của button có id=unActiveAll
    $name = $(this).attr("name");
    //thục hiện gán giá trị của biến name vừa lấy vào thuộc tính name của button có id=submit
    $('button#submit').attr("name",$name);
});
$('button.cancel').click(function () { 
    $('.sweet-overlay').addClass('hide');
});
function confirmDelete() {
    Swal.fire({
        // ... (các tùy chọn khác)
    }).then((result) => {
        if (result.isConfirmed) {
            document.querySelector('input[name="confirmed"]').value = 1;
            document.querySelector('form').submit();
        }
    })
}