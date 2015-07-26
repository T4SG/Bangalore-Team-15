var rData;
var demo;


var demo = new Vue({
	el: '#notifview',
	data: {
		dat : null
	},
	created: function () {
		this.fetchData();
	},
	methods:{
		sendRequest : function(a, b, c){
			self = this;
			$.post('/update.php', { num: b, email: a }).always(function(){
			});

			window.location.reload();
		},
		fetchData: function () {
			var xhr = new XMLHttpRequest();
			var self = this;
			xhr.open('POST', '/filter1.php');
			xhr.onload = function () {
				console.log(xhr.responseText);
				self.dat = $.parseJSON(xhr.responseText);
				console.log($.parseJSON(xhr.responseText));
				window.fu = $.parseJSON(xhr.responseText);

			}
			xhr.send();
		}
	}
});




$('button').on('click', function(){

	$(this).text("Assigned").css("background", '#204d74').css("color", "white");
})
