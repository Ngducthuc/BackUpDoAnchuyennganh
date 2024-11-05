document.addEventListener("DOMContentLoaded", function(event) {
    var modal = document.getElementById("myModal");

    setTimeout(function() {
        modal.style.display = "block";
        modal.querySelector('.modal-content').classList.add('active'); // Thêm class 'active' để kích hoạt hiệu ứng transition
        document.body.style.overflow = 'hidden'; // Ngăn chặn cuộn trang khi modal mở
    }, 2000);

    var span = document.getElementsByClassName("close")[0];

    span.onclick = function() {
        modal.style.display = "none";
        document.body.style.overflow = ''; // Cho phép cuộn trang lại khi modal đóng
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            document.body.style.overflow = '';
        }
    }
});