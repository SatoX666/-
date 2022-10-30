window.onload=function cl3(){
	
	for(var i=0;i<sessionStorage.getItem('count');i++)
	{
document.getElementById('text').value+=sessionStorage.getItem('names'+i) +    '                  '  +sessionStorage.getItem('prices'+i) + '\n';
if(sessionStorage.getItem('photo'+i)!=null){
$('.sells').append('<section class="'+i+'"><div class="rew"><img SRC="'+sessionStorage.getItem('photo'+i)+'" height=300 width300>'+sessionStorage.getItem('names'+i) +    '                  '  +sessionStorage.getItem('prices'+i) + '\n'+'<input type="submit" value="Удалить" onClick="delgoods('+i+')"></div></section');





	
	}
	
	
	document.getElementById('text').value+='-------------------------------- \n';
document.getElementById('text').value+=sessionStorage.getItem('sum');
}
}

var names='';
var prices='';
var sum=0;
var count =0;

function cll(name,price,ert,ert1,photo)
{
if (sessionStorage.getItem('count') !=null)	
{
	
	sum= parseInt(sessionStorage.getItem('sum'));
	count=sessionStorage.getItem('count');
}

var selind = document.getElementById(ert).options.selectedIndex;
var txt= document.getElementById(ert).options[selind].text;
var val= parseInt(document.getElementById(ert).options[selind].value);

var selind = document.getElementById(ert1).options.selectedIndex;
var txt1= document.getElementById(ert1).options[selind].text;
var val1= parseInt(document.getElementById(ert1).options[selind].value);

sessionStorage.setItem('names'+count, name +' '+ txt1);
sessionStorage.setItem('prices'+count, price+val+val1);
sessionStorage.setItem('sum', sum+val+val1);
sessionStorage.setItem('photo'+count, photo);
count++;
sessionStorage.setItem('count', count);
}

function клир() {
document.getElementById('text').value='Сумма:'+' '+'0';
sessionStorage.clear();
}

function delgoods(count)
{
	sessionStorage.removeItem('names'+count)
	sessionStorage.removeItem('prices'+count)
	sessionStorage.removeItem('photo'+count)

var sum = sessionStorage.getItem('sum');
    sum = sum - Number(sessionStorage.getItem('prices'+count));
	sessionStorage.setItem('sum', sum);

	sessionStorage.removeItem('prices'+count);
	$('.'+count).hide();
}