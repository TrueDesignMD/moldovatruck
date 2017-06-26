function count(mixed_var, mode) {
  var key, cnt = 0;
  if (mixed_var === null || typeof mixed_var === 'undefined') {

    return 0;

  } else if (mixed_var.constructor !== Array && mixed_var.constructor !== Object) {

    return 1;

  }

  if (mode === 'COUNT_RECURSIVE') {
    mode = 1;
  }

  if (mode != 1) {
    mode = 0;
  }
  for (key in mixed_var) {
    if (mixed_var.hasOwnProperty(key)) {
      cnt++;
      if (mode == 1 && mixed_var[key] && (mixed_var[key].constructor === Array || mixed_var[key].constructor ===
        Object)) {
        cnt += this.count(mixed_var[key], 1);
      }
    }
  }
  return cnt;
}

function DellMenu(ID)
{
	if (confirm("Вы точно хотите удалить пункт меню?") == true) {
       $.post(admin_page+"dell_menu.php", {ID:ID},function(data){
			if(data=='1') location.reload(true);
			else alert(data);
		});
    }	
}


function DellPage(ID)
{
	if (confirm("Вы точно хотите удалить страницу?") == true) {
       $.post(admin_page+"dell_page.php", {ID:ID},function(data){
			if(data=='1') location.reload(true);
			else alert(data);
		});
    }	
}

function enters()
{
	login = document.getElementById('text').value;
	login = login.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
	pass = document.getElementById('pass').value;
	alerts='';
	if (login==''){alerts+='Логин не заполнен, ';}
	if (pass==''){alerts+='Пароль не заполнен, ';}
	//alert(login+' '+pass);
	if (alerts!==''){alerts = alerts.substr(0,alerts.length-2); $("#alerts").html(alerts);}else{
		$.post(admin_page+"login.php", {login:login,pass:pass},function(data){
		console.log(data);
		if (data=='ok')	location.replace(admin_page);
			else $("#alerts").html(data);
		} );
	}
}
function trm(row)
{
	i=0;
	while(i<count(row))
	{
		str = $("#"+row[i]).val();
		str = str.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
		$("#"+row[i]).val(str);
	
		i++;
	}
}
function clear_row(row)
{
	
	i=0;
	while(i<count(row))
	{
		$('#'+row[i]).val('');
		i++;
	}
}
function Search(news)
{
	title = $('#search').val();
	$.post(admin_page+"find_page.php", {title:title,news:news},function(data){
		$('#result').html(data);
	});
}
function Parent()
{
	ID = $('#type').val();
	$.post(admin_page+"parent.php", {type:ID},function(data){
		$('#parent').html(data);
	});
}

