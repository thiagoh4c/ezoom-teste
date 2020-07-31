
$(document).ready(() => {
    $(document).on('click', '.btnDeletar', function()    {
         if(confirm("Deseja deletar este curso?")){
            let id = $(this).data('id');
            window.location.href = '/painel?deletar='+id;
         }
    });

    $(document).on('click', '#submit', () => {
        $('#editar-inserir').submit();
    });

    $(document).on('click', '#escolher-imagens', () => {
        $('#files').click();
    });

	$(document).on("change", "#files", function(e) {

	    for(let file of e.target.files){

	      const fileToUpload = file;
	      const reader = new FileReader();

	      reader.onload = e => {
	        let img = document.createElement('img');
	        img.src = e.target.result;
	        let oid = Math.round(new Date().getTime()/1000);
	        img.id=oid;
	        img.onload = function(){
	            img.width = 100;
	            let d = document.createElement('div');
	            $(d).append(img);
	            $(img).addClass('imgCurso');
	            $('.galeria').prepend(d);
	        };
	      }
	      reader.readAsDataURL(fileToUpload);
	    }
	});


	$(document).on("click", ".imgCurso", function(e) {
		let id = $(this).data('id');
		imgPrincipal = id;
		$('.imgCurso').removeClass('principal');
		$(this).addClass('principal');
		$('#imagem_principal').val(imgPrincipal)

	});

	$( "#editar-inserir" ).submit(function( event ) {
	  if($('#files').val().length==0 && $('.imgCurso').length==0){
	  	alert("Imagens são obrigatorias");
	  	event.preventDefault();
	  	return;
	  }

	  if($('#titulo').val()==''){
	  	alert("Precisa inserir um título");
	  	event.preventDefault();
	  	return;
	  }

	});
});
