<style media="screen">
.vert-move {
  -webkit-animation: animate 1s infinite  alternate;
  animation: animate 1s infinite  alternate;
}
.vert-move {
  -webkit-animation: animate 1s infinite  alternate;
  animation: animate 1s infinite  alternate;
}
@-webkit-keyframes animate {
  0% { transform: translateY(0); }
  100% { transform: translateY(-10px); }
}
@keyframes animate {
  0% { transform: translateY(0); }
  100% { transform: translateY(-10px); }
}

.pageLoader
{
    position: absolute;
    top: 0;
    left: 0; /*make it stay on the grid*/
    height: 100%; /*cover grid area*/
    z-index: 999;
    width: 100%;
    display:table;
    background: rgba(0, 0, 0, 0.5);
    transition: all 0.5s;
}
.pageLoader i {
   display:table-cell;
    vertical-align:middle;
    text-align:center;
}
.custom-chk
{
  border-radius: 4px;
  background-color: #52a7e0;
  color:white;
  transition: .5s;
}
.custom-chk:hover
{
  background-color: #3498db;
}
.custom-chk.active
{
  background-color: #2283c3;
}
.custom-chk.active:hover
{
  background-color: #1a6698;
}
.phone::-webkit-inner-spin-button,
.phone::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
.bg-custom-blue
{
  background-color: #215FA3;
  border-bottom: 1px solid white !important;
}
.bg-custom-blue:hover
{
  background-color: #1A4C82;
  transition: .5s!important;
}
.bg-custom-blue .active
{
  background-color: #113153;
  border-bottom: 1px solid white !important;
}
@font-face {
  font-family: 'Roboto Mono';
  font-style: normal;
  font-weight: normal;
  src: local('Roboto Mono'), url('{{asset('Roboto_Mono/static/RobotoMono-Regular.ttf')}}');
}
td.slashed{
	font-family: 'Roboto Mono', sans-serif!important;
	-webkit-font-feature-settings: "zero"!important;
	-moz-font-feature-settings: "zero=1"!important;
	-moz-font-feature-settings: "zero"!important;
	-ms-font-feature-settings: "zero"!important;
	-o-font-feature-settings: "zero"!important;
	font-feature-settings: "zero"!important;
  -webkit-font-feature-settings: "ss01", "ss02", "ss03", "ss04";
  font-feature-settings: "ss01", "ss02", "ss03", "ss04";
	font-variant: slashed-zero!important;
}
</style>
