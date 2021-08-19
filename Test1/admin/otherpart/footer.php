    <!-- Footer-->

        <script>
            let btn = document.querySelector("#btn");
            let sidebar = document.querySelector(".sidebar");
            let searchBtn = document.querySelector(".bx-search");

            btn.onclick = function(){
                sidebar.classList.toggle("active");
            }
            searchBtn.onclick = function(){
                sidebar.classList.toggle("active");
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="../js/admin.js"></script>
    </body>
</html>