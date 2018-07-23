function emailvalidate(e)
{
	var b=/^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/;
	return b.test(e);
}

/***********************************************************************/

function htmlEntities(str)
{
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}

/***********************************************************************/

function validatedate(a) {
 strExpReg = /^(((0[1-9]|[12][0-9]|3[01])([/])(0[13578]|10|12)([/])(\d{4}))|(([0][1-9]|[12][0-9]|30)([/])(0[469]|11)([/])(\d{4}))|((0[1-9]|1[0-9]|2[0-8])([/])(02)([/])(\d{4}))|((29)(\.|-|\/)(02)([/])([02468][048]00))|((29)([/])(02)([/])([13579][26]00))|((29)([/])(02)([/])([0-9][0-9][0][48]))|((29)([/])(02)([/])([0-9][0-9][2468][048]))|((29)([/])(02)([/])([0-9][0-9][13579][26])))$/;
 return strExpReg.test(a);
}

/***********************************************************************/

function maxLong(txt, maxlong, divtxtcount)
{
	var in_value, out_value; 
	if (txt.value.length > maxlong) {
		in_value = txt.value; 
		out_value = in_value.substring(0, maxlong); 
		txt.value = out_value;
		missingletters = maxlong - txt.value.length;
		$('#' + divtxtcount).html(missingletters);	
		return false; 
	} 
	missingletters = maxlong - txt.value.length;
	$('#' + divtxtcount).html(missingletters);  
	return true; 
}

/***********************************************************************/

function opendiv(thediv,message)
{
	$(thediv).html(message);
	$(thediv).slideDown("slow");
}

/***********************************************************************/

var divactive='';
function openandclose(thediv,message,thetime)
{
	$(thediv).html(message);
	$(thediv).slideDown("slow", function(){
		divactive=thediv;
		delayactive=setTimeout(closediv,thetime);
	});	
}

/***********************************************************************/

function closediv()
{
	$(divactive).slideUp("slow", function(){
		clearTimeout(delayactive);
	});
}

/***********************************************************************/

function transformTextarea()
{
	$('body').on('keyup', 'textarea', function(){
		$(this).height(0);
		$(this).height(this.scrollHeight);
	});
}

/*************************************/
/*************************************/

/*** Update v1.2 ***/

function insertEmoticon(areaText, stringEmo) {
	var item_dom = document.getElementsByName(areaText)[0];
	if (document.selection) {
		item_dom.focus();
		sel = document.selection.createRange();
		sel.text = ' ' + stringEmo + ' ';
		return;
	}
	
	if (item_dom.selectionStart || item_dom.selectionStart == "0") {
		var t_start = item_dom.selectionStart;
		var t_end = item_dom.selectionEnd;
		var val_start = item_dom.value.substring(0, t_start);
		var val_end = item_dom.value.substring(t_end, item_dom.value.length);
		item_dom.value = val_start + ' ' + stringEmo + ' ' + val_end;
	} else item_dom.value += ' ' + stringEmo + ' ';
	
	item_dom.focus(); 
}

/*** end Update v1.2 ***/