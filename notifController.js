var rData;
var demo;


var demo = new Vue({
	el: '#notifview',
	data: {
		dat : null
	},
	created: function () {
		this.fetchData();
		this.$watch('dat', function () {
			this.fetchData();
		});
	},
	methods:{
		sendRequest : function(a, b, c){
			self = this;
			$.post('/update.php', { num: b, email: a }).always(function(){
			});
		},
		fetchData: function () {
			var xhr = new XMLHttpRequest();
			var self = this;
			xhr.open('GET', '/filter1.php');
			xhr.onload = function () {
				self.dat = $.parseJSON(xhr.responseText)[0];
			}
			xhr.send();
		}
	}
});




$('button').on('click', function(){

	$(this).text("Assigned").css("background", '#204d74').css("color", "white");
})
