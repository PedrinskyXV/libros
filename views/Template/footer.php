<footer class="mt-auto text-white-50 bg-dark py-3 align-items-center">
    <div class="flex-grow-1 ms-3">
        &copy; 2021 Copyright: <span class="text-white">Pedro Pérez -- 323418</span>&nbsp&nbsp<span class="text-white">Rodrigo A. Hidalgo -- 332518</span>
    </div>
</footer>
</div>

<script>
    var url = "<?=constant('URL')?>";
</script>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
<script src="<?=constant('URL')?>public/validetta/validetta.js"></script>
<script src="<?=constant('URL')?>public/js/libros.js"></script>

<script type="text/javascript">
	$(window).on("load",function(){
		$(".loader").fadeOut(3500);
	});
</script>


</body>

</html>