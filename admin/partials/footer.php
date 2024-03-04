<!-- Footer Section Start -->
<div class="footer">
    <div class="wrapper">
        <p class="text-center">2024 All rights reserved, Food House. Developed By - <a href="#">Tran Trung Kien</a></p>
    </div>
</div>
<!-- Footer Section End -->
<script>
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var img = document.getElementById('preview-image');
            img.src = reader.result;
            img.style.height = '200px';
            if(img.style.display == 'none'){
                img.style.display = 'block';
            }

            var fileName = document.querySelector('.file-name');
            fileName.textContent = input.files[0].name;
        };
        reader.readAsDataURL(input.files[0]);
    }

    // Ẩn các nút tăng giảm giá trị
document.getElementById("price").addEventListener("wheel", function(event) {
    this.blur();
    event.preventDefault();
});
</script>
</body>

</html>