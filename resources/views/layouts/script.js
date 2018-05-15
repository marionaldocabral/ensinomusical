<script type="text/javascript">
    function saoIguais(a, b){
        var r = false;
        if(a.length == b.length){
            r = true;
            for(var i = 0; i < a.length; i++){
                if(a[i] != b[i]){
                    r = false;
                }
            }
        }
        return r;
    }
    var xmlhttp = new XMLHttpRequest();
    var estados;
    var selectEstado = "<select name="estado" class="form-control"   onchange="procurarCidades()" value="{{ old('estado') }}" required >";
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            estados = JSON.parse(this.responseText);
            for(var i = 0; i < estados.length; i++){
                selectEstado += "<option>" + estados[i].sigla + "</option>";
            }
            selectEstado += "</select>";
            document.getElementById("estado").innerHTML = selectEstado;
        }
    };
    xmlhttp.open("GET", "locais.json", true);
    xmlhttp.send();
    function procurarCidades(){
        if(document.getElementById("estado").value.length == 0)
            alert("Informe o Estado!");
        else{
            var cidades;
            var selectCidade = "<select>";
            var parametro = document.getElementById("estado").value.toUpperCase();
            for(var i = 0; i < estados.length; i++){
                var sigla = estados[i].sigla.toUpperCase();
                if(saoIguais(parametro, sigla)){
                    cidades = estados[i].cidades
                    for(var j = 0; j < cidades.length; j++){
                        selectCidade += "<option>" + cidades[j] + "</option>";
                    }
                    selectCidade += "</select>";
                    break;
                }
            }
            document.getElementById("cidade").innerHTML = selectCidade;
            xmlhttp.send();
        }
    }
</script>
