/*
 Highcharts JS v6.2.0 (2018-10-17)
 Tree Grid

 (c) 2016 Jon Arild Nygard

 --- WORK IN PROGRESS ---

 License: www.highcharts.com/license
*/
(function(E){"object"===typeof module&&module.exports?module.exports=E:"function"===typeof define&&define.amd?define(function(){return E}):E(Highcharts)})(function(E){(function(a){var z=function(c){return Array.prototype.slice.call(c,1)},B=a.dateFormat,u=a.defined,w=a.each,m=a.isArray,A=a.isNumber,t=function(c){return a.isObject(c,!0)},D=a.merge,p=a.pick,k=a.wrap,h=a.Axis,e=a.Tick,f={top:0,right:1,bottom:2,left:3,0:"top",1:"right",2:"bottom",3:"left"};h.prototype.isNavigatorAxis=function(){return/highcharts-navigator-[xy]axis/.test(this.options.className)};
h.prototype.isOuterAxis=function(){var c=this,d=-1,b=!0;w(c.chart.axes,function(q,g){q.side!==c.side||q.isNavigatorAxis()||(q===c?d=g:0<=d&&g>d&&(b=!1))});return b};h.prototype.getMaxLabelDimensions=function(c,d){var b={width:0,height:0};w(d,function(d){d=c[d];var g;t(d)&&(g=t(d.label)?d.label:{},d=g.getBBox?g.getBBox().height:0,g=A(g.textPxLength)?g.textPxLength:0,b.height=Math.max(d,b.height),b.width=Math.max(g,b.width))});return b};a.dateFormats={W:function(c){c=new Date(c);var d;c.setHours(0,
0,0,0);c.setDate(c.getDate()-(c.getDay()||7));d=new Date(c.getFullYear(),0,1);return Math.ceil(((c-d)/864E5+1)/7)},E:function(c){return B("%a",c,!0).charAt(0)}};k(h.prototype,"autoLabelAlign",function(c){return this.chart.isStock?"left":c.apply(this,z(arguments))});k(e.prototype,"getLabelPosition",function(c,d,b,a,g,x,e,k){var l=this.axis,n=l.reversed,q=l.chart,r=l.options,h=r&&t(r.grid)?r.grid:{},r=x.align,v=f[l.side],p=l.tickPositions,G=this.pos-e,H=A(p[k+1])?p[k+1]-e:l.max+e,y=l.tickSize("tick",
!0),p=m(y)?y[0]:0,y=y&&y[1]/2,C;!0===h.enabled?("top"===v?(h=l.top+l.offset,C=h-p):"bottom"===v?(C=q.chartHeight-l.bottom+l.offset,h=C+p):(h=l.top+l.len-l.translate(n?H:G),C=l.top+l.len-l.translate(n?G:H)),"right"===v?(v=q.chartWidth-l.right+l.offset,n=v+p):"left"===v?(n=l.left+l.offset,v=n-p):(v=Math.round(l.left+l.translate(n?H:G))-y,n=Math.round(l.left+l.translate(n?G:H))-y),this.slotWidth=n-v,n={x:"left"===r?v:"right"===r?n:v+(n-v)/2,y:C+(h-C)/2},q=q.renderer.fontMetrics(x.style.fontSize,a.element),
r=a.getBBox().height,x.useHTML?n.y+=q.b+-(r/2):(r=Math.round(r/q.h),n.y+=(q.b-(q.h-q.f))/2+-((r-1)*q.h/2)),n.x+=l.horiz&&x.x||0):n=c.apply(this,z(arguments));return n});k(h.prototype,"tickSize",function(c){var d=this.maxLabelDimensions,b=this.options,e=b&&t(b.grid)?b.grid:{},b=c.apply(this,z(arguments));!0===e.enabled&&(e=2*Math.abs(this.defaultLeftAxisOptions.labels.x),d=e+(this.horiz?d.height:d.width),m(b)?b[0]=d:b=[d]);return b});k(h.prototype,"getTitlePosition",function(c){var d=this.options;
if(!0===(d&&t(d.grid)?d.grid:{}).enabled){var b=this.axisTitle,e=b&&b.getBBox().width,g=this.horiz,a=this.left,r=this.top,h=this.width,l=this.height,n=d.title,d=this.opposite,k=this.offset,F=this.tickSize()||[0],u=n.x||0,w=n.y||0,m=p(n.margin,g?5:10),b=this.chart.renderer.fontMetrics(n.style&&n.style.fontSize,b).f,F=(g?r+l:a)+F[0]/2*(d?-1:1)*(g?1:-1)+(this.side===f.bottom?b:0);return{x:g?a-e/2-m+u:F+(d?h:0)+k+u,y:g?F-(d?l:0)+(d?b:-b)/2+k+w:r-m+w}}return c.apply(this,z(arguments))});k(h.prototype,
"unsquish",function(c){var d=this.options;return!0===(d&&t(d.grid)?d.grid:{}).enabled&&this.categories?this.tickInterval:c.apply(this,z(arguments))});a.addEvent(h,"afterSetOptions",function(c){var d=this.options;c=c.userOptions;var b,e=d&&t(d.grid)?d.grid:{};!0===e.enabled&&(b=D(!0,{className:"highcharts-grid-axis "+(c.className||""),dateTimeLabelFormats:{hour:{list:["%H:%M","%H"]},day:{list:["%A, %e. %B","%a, %e. %b","%E"]},week:{list:["Week %W","W%W"]},month:{list:["%B","%b","%o"]}},grid:{borderWidth:1},
labels:{padding:2,style:{fontSize:"13px"}},title:{text:null,reserveSpace:!1,rotation:0},units:[["millisecond",[1,10,100]],["second",[1,10]],["minute",[1,5,15]],["hour",[1,6]],["day",[1]],["week",[1]],["month",[1]],["year",null]]},c),"xAxis"===this.coll&&(u(c.linkedTo)&&!u(c.tickPixelInterval)&&(b.tickPixelInterval=350),u(c.tickPixelInterval)||!u(c.linkedTo)||u(c.tickPositioner)||u(c.tickInterval)||(b.tickPositioner=function(c,d){var g=this.linkedParent&&this.linkedParent.tickPositions&&this.linkedParent.tickPositions.info;
if(g){var e,l,x,f,q=b.units;for(f=0;f<q.length;f++)if(q[f][0]===g.unitName){e=f;break}if(q[e][1])return q[e+1]&&(x=q[e+1][0],l=(q[e+1][1]||[1])[0]),g=a.timeUnits[x],this.tickInterval=g*l,this.getTimeTicks({unitRange:g,count:l,unitName:x},c,d,this.options.startOfWeek)}})),D(!0,this.options,b),this.horiz&&(d.minPadding=p(c.minPadding,0),d.maxPadding=p(c.maxPadding,0)),A(d.grid.borderWidth)&&(d.tickWidth=d.lineWidth=e.borderWidth))});k(h.prototype,"setAxisTranslation",function(c){var d=this.options,
b=d&&t(d.grid)?d.grid:{},e=this.tickPositions&&this.tickPositions.info,g=this.userOptions.labels||{};this.horiz&&(!0===b.enabled&&w(this.series,function(b){b.options.pointRange=0}),e&&(!1===d.dateTimeLabelFormats[e.unitName].range||1<e.count)&&!u(g.align)&&(d.labels.align="left",u(g.x)||(d.labels.x=3)));c.apply(this,z(arguments))});k(h.prototype,"trimTicks",function(c){var d=this.options,b=d&&t(d.grid)?d.grid:{},e=this.categories,g=this.tickPositions,a=g[0],f=g[g.length-1],h=this.linkedParent&&this.linkedParent.min||
this.min,l=this.linkedParent&&this.linkedParent.max||this.max,n=this.tickInterval,k=a>h,p=f<l,a=a<h&&a+n>h,f=f>l&&f-n<l;!0!==b.enabled||e||!this.horiz&&!this.isLinked||(!k&&!a||d.startOnTick||(g[0]=h),!p&&!f||d.endOnTick||(g[g.length-1]=l));c.apply(this,z(arguments))});k(h.prototype,"render",function(c){var d=this.options,b=d&&t(d.grid)?d.grid:{},e,g,a,h,k,l=this.chart.renderer,n=this.horiz;if(!0===b.enabled){if(b=2*Math.abs(this.defaultLeftAxisOptions.labels.x),this.maxLabelDimensions=this.getMaxLabelDimensions(this.ticks,
this.tickPositions),b=this.maxLabelDimensions.width+b,e=d.lineWidth,this.rightWall&&this.rightWall.destroy(),c.apply(this),c=this.axisGroup.getBBox(),this.isOuterAxis()&&this.axisLine&&(n&&(b=c.height-1),e)){c=this.getLinePath(e);h=c.indexOf("M")+1;k=c.indexOf("L")+1;g=c.indexOf("M")+2;a=c.indexOf("L")+2;if(this.side===f.top||this.side===f.left)b=-b;n?(c[g]+=b,c[a]+=b):(c[h]+=b,c[k]+=b);this.axisLineExtra?this.axisLineExtra.animate({d:c}):this.axisLineExtra=l.path(c).attr({stroke:d.lineColor,"stroke-width":e,
zIndex:7}).addClass("highcharts-axis-line").add(this.axisGroup);this.axisLine[this.showAxis?"show":"hide"](!0)}}else c.apply(this)});k(h.prototype,"init",function(c,d,b){function e(b){var c=b.options,d=25/11,e=b.chart.renderer.fontMetrics(c.labels.style.fontSize);c.labels||(c.labels={});c.labels.align=p(c.labels.align,"center");b.categories||(c.showLastLabel=!1);b.horiz&&(c.tickLength=g.cellHeight||e.h*d);b.labelRotation=0;c.labels.rotation=0}var g=b&&t(b.grid)?b.grid:{},f,r,v;if(g.enabled)if(u(g.borderColor)&&
(b.tickColor=b.lineColor=g.borderColor),m(g.columns))for(r=0,v=g.columns.length;v--;)f=D(b,g.columns[v],{type:"category"}),delete f.grid.columns,f=new h(d,f),f.isColumn=!0,f.columnIndex=r,k(f,"labelFormatter",function(b){var c=this.axis,d=c.tickPositions,g=this.value,e=g===d[0],d=g===d[d.length-1],f=a.find(c.series[0].options.data,function(b){return b[c.isXAxis?"x":"y"]===g});this.isFirst=e;this.isLast=d;this.point=f;return b.call(this)}),r++;else c.apply(this,z(arguments)),e(this);else c.apply(this,
z(arguments))})})(E);var J=function(a){var z=a.each,B=a.extend,u=a.isNumber,w=a.keys,m=a.map,A=a.pick,t=a.reduce,D=function(k,h){var e=t(k,function(e,c){var d=A(c.parent,"");void 0===e[d]&&(e[d]=[]);e[d].push(c);return e},{});k=w(e);z(k,function(f,c){var d=e[f];""!==f&&-1===a.inArray(f,h)&&(z(d,function(b){c[""].push(b)}),delete c[f])});return e},p=function(a,h,e,f,c,d){var b=0,k=0,g=d&&d.after,x=d&&d.before;h={data:f,depth:e-1,id:a,level:e,parent:h};var r,v;"function"===typeof x&&x(h,d);x=m(c[a]||
[],function(g){var f=p(g.id,a,e+1,g,c,d),h=g.start;g=!0===g.milestone?h:g.end;r=!u(r)||h<r?h:r;v=!u(v)||g>v?g:v;b=b+1+f.descendants;k=Math.max(f.height+1,k);return f});f&&(f.start=A(f.start,r),f.end=A(f.end,v));B(h,{children:x,descendants:b,height:k});"function"===typeof g&&g(h,d);return h};return{getListOfParents:D,getNode:p,getTree:function(a,h){var e=m(a,function(e){return e.id});a=D(a,e);return p("",null,1,null,a,h)}}}(E),L=function(a){var z=a.each,B=a.extend,u=a.isArray,w=a.isObject,m=a.isNumber,
A=a.merge,t=a.pick,D=a.reduce;return{getColor:function(p,k){var h=k.index,e=k.mapOptionsToLevel,f=k.parentColor,c=k.parentColorIndex,d=k.series,b=k.colors,q=k.siblings,g=d.points,x,r,v,l;if(p){g=g[p.i];p=e[p.level]||{};if(x=g&&p.colorByPoint)v=g.index%(b?b.length:d.chart.options.chart.colorCount),r=b&&b[v];b=g&&g.options.color;x=p&&p.color;if(e=f)e=(e=p&&p.colorVariation)&&"brightness"===e.key?a.color(f).brighten(h/q*e.to).get():f;x=t(b,x,r,e,d.color);l=t(g&&g.options.colorIndex,p&&p.colorIndex,v,
c,k.colorIndex)}return{color:x,colorIndex:l}},getLevelOptions:function(a){var k=null,h,e,f,c;if(w(a))for(k={},f=m(a.from)?a.from:1,c=a.levels,e={},h=w(a.defaults)?a.defaults:{},u(c)&&(e=D(c,function(c,b){var d,g;w(b)&&m(b.level)&&(g=A({},b),d="boolean"===typeof g.levelIsConstant?g.levelIsConstant:h.levelIsConstant,delete g.levelIsConstant,delete g.level,b=b.level+(d?0:f-1),w(c[b])?B(c[b],g):c[b]=g);return c},{})),c=m(a.to)?a.to:1,a=0;a<=c;a++)k[a]=A({},h,w(e[a])?e[a]:{});return k},setTreeValues:function k(a,
e){var f=e.before,c=e.idRoot,d=e.mapIdToNode[c],b=e.points[a.i],h=b&&b.options||{},g=0,x=[];B(a,{levelDynamic:a.level-(("boolean"===typeof e.levelIsConstant?e.levelIsConstant:1)?0:d.level),name:t(b&&b.name,""),visible:c===a.id||("boolean"===typeof e.visible?e.visible:!1)});"function"===typeof f&&(a=f(a,e));z(a.children,function(b,c){var d=B({},e);B(d,{index:c,siblings:a.children.length,visible:a.visible});b=k(b,d);x.push(b);b.visible&&(g+=b.val)});a.visible=0<g||a.visible;f=t(h.value,g);B(a,{children:x,
childrenTotal:g,isLeaf:a.visible&&!g,val:f});return a},updateRootId:function(a){var h;w(a)&&(h=w(a.options)?a.options:{},h=t(a.rootNode,h.rootId,""),w(a.userOptions)&&(a.userOptions.rootId=h),a.rootNode=h);return h}}}(E);(function(a){function z(){return Array.prototype.slice.call(arguments,1)}function B(a){a.apply(this);this.drawBreaks(this.xAxis,["x"]);this.drawBreaks(this.yAxis,w(this.pointArrayMap,["y"]))}var u=a.addEvent,w=a.pick,m=a.wrap,A=a.each,t=a.extend,D=a.isArray,p=a.fireEvent,k=a.Axis,
h=a.Series;t(k.prototype,{isInBreak:function(a,f){var c=a.repeat||Infinity,d=a.from,b=a.to-a.from;f=f>=d?(f-d)%c:c-(d-f)%c;return a.inclusive?f<=b:f<b&&0!==f},isInAnyBreak:function(a,f){var c=this.options.breaks,d=c&&c.length,b,e,g;if(d){for(;d--;)this.isInBreak(c[d],a)&&(b=!0,e||(e=w(c[d].showPoints,this.isXAxis?!1:!0)));g=b&&f?b&&!e:b}return g}});u(k,"afterInit",function(){"function"===typeof this.setBreaks&&this.setBreaks(this.options.breaks,!1)});u(k,"afterSetTickPositions",function(){if(this.isBroken){var a=
this.tickPositions,f=this.tickPositions.info,c=[],d;for(d=0;d<a.length;d++)this.isInAnyBreak(a[d])||c.push(a[d]);this.tickPositions=c;this.tickPositions.info=f}});u(k,"afterSetOptions",function(){this.isBroken&&(this.options.ordinal=!1)});k.prototype.setBreaks=function(a,f){function c(a){var c=a,d,g;for(g=0;g<b.breakArray.length;g++)if(d=b.breakArray[g],d.to<=a)c-=d.len;else if(d.from>=a)break;else if(b.isInBreak(d,a)){c-=a-d.from;break}return c}function d(a){var c,d;for(d=0;d<b.breakArray.length&&
!(c=b.breakArray[d],c.from>=a);d++)c.to<a?a+=c.len:b.isInBreak(c,a)&&(a+=c.len);return a}var b=this,e=D(a)&&!!a.length;b.isDirty=b.isBroken!==e;b.isBroken=e;b.options.breaks=b.userOptions.breaks=a;b.forceRedraw=!0;e||b.val2lin!==c||(delete b.val2lin,delete b.lin2val);e&&(b.userOptions.ordinal=!1,b.val2lin=c,b.lin2val=d,b.setExtremes=function(a,b,c,d,e){if(this.isBroken){for(;this.isInAnyBreak(a);)a-=this.closestPointRange;for(;this.isInAnyBreak(b);)b-=this.closestPointRange}k.prototype.setExtremes.call(this,
a,b,c,d,e)},b.setAxisTranslation=function(a){k.prototype.setAxisTranslation.call(this,a);this.unitLength=null;if(this.isBroken){a=b.options.breaks;var c=[],d=[],e=0,g,f,h=b.userMin||b.min,q=b.userMax||b.max,u=w(b.pointRangePadding,0),m,t;A(a,function(a){f=a.repeat||Infinity;b.isInBreak(a,h)&&(h+=a.to%f-h%f);b.isInBreak(a,q)&&(q-=q%f-a.from%f)});A(a,function(a){m=a.from;for(f=a.repeat||Infinity;m-f>h;)m-=f;for(;m<h;)m+=f;for(t=m;t<q;t+=f)c.push({value:t,move:"in"}),c.push({value:t+(a.to-a.from),move:"out",
size:a.breakSize})});c.sort(function(a,b){return a.value===b.value?("in"===a.move?0:1)-("in"===b.move?0:1):a.value-b.value});g=0;m=h;A(c,function(a){g+="in"===a.move?1:-1;1===g&&"in"===a.move&&(m=a.value);0===g&&(d.push({from:m,to:a.value,len:a.value-m-(a.size||0)}),e+=a.value-m-(a.size||0))});b.breakArray=d;b.unitLength=q-h-e+u;p(b,"afterBreaks");b.staticScale?b.transA=b.staticScale:b.unitLength&&(b.transA*=(q-b.min+u)/b.unitLength);u&&(b.minPixelPadding=b.transA*b.minPointOffset);b.min=h;b.max=
q}});w(f,!0)&&this.chart.redraw()};m(h.prototype,"generatePoints",function(a){a.apply(this,z(arguments));var e=this.xAxis,c=this.yAxis,d=this.points,b,h=d.length,g=this.options.connectNulls,k;if(e&&c&&(e.options.breaks||c.options.breaks))for(;h--;)b=d[h],k=null===b.y&&!1===g,k||!e.isInAnyBreak(b.x,!0)&&!c.isInAnyBreak(b.y,!0)||(d.splice(h,1),this.data[h]&&this.data[h].destroyElements())});a.Series.prototype.drawBreaks=function(a,f){var c=this,d=c.points,b,e,g,h;a&&A(f,function(f){b=a.breakArray||
[];e=a.isXAxis?a.min:w(c.options.threshold,a.min);A(d,function(c){h=w(c["stack"+f.toUpperCase()],c[f]);A(b,function(b){g=!1;if(e<b.from&&h>b.to||e>b.from&&h<b.from)g="pointBreak";else if(e<b.from&&h>b.from&&h<b.to||e>b.from&&h>b.to&&h<b.from)g="pointInBreak";g&&p(a,g,{point:c,brk:b})})})})};a.Series.prototype.gappedPath=function(){var e=this.currentDataGrouping,f=e&&e.totalRange,e=this.options.gapSize,c=this.points.slice(),d=c.length-1,b=this.yAxis;if(e&&0<d)for("value"!==this.options.gapUnit&&(e*=
this.closestPointRange),f&&f>e&&(e=f);d--;)c[d+1].x-c[d].x>e&&(f=(c[d].x+c[d+1].x)/2,c.splice(d+1,0,{isNull:!0,x:f}),this.options.stacking&&(f=b.stacks[this.stackKey][f]=new a.StackItem(b,b.options.stackLabels,!1,f,this.stack),f.total=0));return this.getGraphPath(c)};m(a.seriesTypes.column.prototype,"drawPoints",B);m(a.Series.prototype,"drawPoints",B)})(E);(function(a,z,B){var u=function(a){return Array.prototype.slice.call(a,1)},w=a.defined,m=a.each,A=a.extend,t=a.find,D=a.fireEvent,p=B.getLevelOptions,
k=a.map,h=a.merge,e=a.inArray,f=a.isNumber,c=function(b){return a.isObject(b,!0)},d=a.isString,b=a.keys,q=a.pick,g=a.reduce,x=a.wrap;B=a.Axis;var r=a.Tick,v=function(a,b){var c=!1;m(a,function(a,d,e){c||(c=b(a,d,e))});return c},l=function(a,b){var c,d;for(c in b)b.hasOwnProperty(c)&&(d=b[c],x(a,c,d))},n=function(a,b){var c=a.collapseStart;a=a.collapseEnd;a>=b&&(c-=.5);return{from:c,to:a,showPoints:!1}},E=function(a){return g(b(a.mapOfPosToGridNode),function(b,c){c=+c;a.min<=c&&a.max>=c&&!a.isInAnyBreak(c)&&
b.push(c);return b},[])},F=function(a,b){var c=a.options.breaks||[],d=n(b,a.max);return v(c,function(a){return a.from===d.from&&a.to===d.to})},I=function(a,b){var c=a.options.breaks||[];a=n(b,a.max);c.push(a);return c},K=function(a,b){var c=a.options.breaks||[],d=n(b,a.max);return g(c,function(a,b){b.to===d.to&&b.from===d.from||a.push(b);return a},[])},J=function(b,c){var d=b.labelIcon,e=!d,g=c.renderer,f=c.xy,h=c.options,y=h.width,k=h.height,l=f.x-y/2-h.padding,f=f.y-k/2,H=c.collapsed?90:180,m=c.show&&
a.isNumber(f);e&&(b.labelIcon=d=g.path(g.symbols[h.type](h.x,h.y,y,k)).addClass("highcharts-label-icon").add(c.group));m||d.attr({y:-9999});d.attr({"stroke-width":1,fill:q(c.color,"#666666")}).css({cursor:"pointer",stroke:h.lineColor,strokeWidth:h.lineWidth});d[e?"attr":"animate"]({translateX:l,translateY:f,rotation:H})},G=function(a,b,e){var g=[],f=[],h={},k={},y=-1,l="boolean"===typeof b?b:!1;a=z.getTree(a,{after:function(a){a=k[a.pos];var b=0,c=0;m(a.children,function(a){c+=a.descendants+1;b=Math.max(a.height+
1,b)});a.descendants=c;a.height=b;a.collapsed&&f.push(a)},before:function(a){var b=c(a.data)?a.data:{},e=d(b.name)?b.name:"",f=h[a.parent],f=c(f)?k[f.pos]:null,C=function(a){return a.name===e},m;l&&c(f)&&(m=t(f.children,C))?(C=m.pos,m.nodes.push(a)):C=y++;k[C]||(k[C]=m={depth:f?f.depth+1:0,name:e,nodes:[a],children:[],pos:C},-1!==C&&g.push(e),c(f)&&f.children.push(m));d(a.id)&&(h[a.id]=a);!0===b.collapsed&&(m.collapsed=!0);a.pos=C}});k=function(a,b){var d=function(a,e,f){var g=e+(-1===e?0:b-1),h=
(g-e)/2,k=e+h;m(a.nodes,function(a){var b=a.data;c(b)&&(b.y=e+b.seriesIndex,delete b.seriesIndex);a.pos=k});f[k]=a;a.pos=k;a.tickmarkOffset=h+.5;a.collapseStart=g+.5;m(a.children,function(a){d(a,g+1,f);g=a.collapseEnd-.5});a.collapseEnd=g+.5;return f};return d(a["-1"],-1,{})}(k,e);return{categories:g,mapOfIdToNode:h,mapOfPosToGridNode:k,collapsedNodes:f,tree:a}};l(B.prototype,{init:function(b,c,d){var e=this,g,f="treegrid"===d.type;f&&(d=h({grid:{enabled:!0},labels:{align:"left",levels:[{level:void 0},
{level:1,style:{fontWeight:"bold"}}],symbol:{type:"triangle",x:-5,y:-5,height:10,width:10,padding:5}},uniqueNames:!1},d,{reversed:!0,grid:{columns:void 0}}));b.apply(e,[c,d]);f&&(a.addEvent(e.chart,"beforeRender",function(){var b=e.options&&e.options.labels;e.updateYNames();m(e.series,function(a){a.yData=k(a.options.data,function(a){return a.y})});e.mapOptionsToLevel=p({defaults:b,from:1,levels:b.levels,to:e.tree.height});g=a.addEvent(e,"foundExtremes",function(){m(e.collapsedNodes,function(a){a=
I(e,a);e.setBreaks(a,!1)});g()})}),e.hasNames=!0,e.options.showLastLabel=!0)},getMaxLabelDimensions:function(a){var b=this.options,c=b&&b.labels,b=c&&f(c.indentation)?b.labels.indentation:0,c=a.apply(this,u(arguments)),d;"treegrid"===this.options.type&&(d=this.mapOfPosToGridNode[-1].height,c.width+=b*(d-1));return c},generateTick:function(a,b){var d=c(this.mapOptionsToLevel)?this.mapOptionsToLevel:{},e=this.ticks,g=e[b],f,h;"treegrid"===this.options.type?(h=this.mapOfPosToGridNode[b],(d=d[h.depth])&&
(f={labels:d}),g?(g.parameters.category=h.name,g.options=f,g.addLabel()):e[b]=new r(this,b,null,void 0,{category:h.name,tickmarkOffset:h.tickmarkOffset,options:f})):a.apply(this,u(arguments))},setTickInterval:function(a){var b=this.options;"treegrid"===b.type?(this.min=q(this.userMin,b.min,this.dataMin),this.max=q(this.userMax,b.max,this.dataMax),D(this,"foundExtremes"),this.setAxisTranslation(!0),this.tickmarkOffset=.5,this.tickInterval=1,this.tickPositions=E(this)):a.apply(this,u(arguments))}});
l(r.prototype,{getLabelPosition:function(a,b,d,e,g,h,k,l,m){var y=q(this.options&&this.options.labels,h);h=this.pos;var n=this.axis,p="treegrid"===n.options.type;a=a.apply(this,[b,d,e,g,y,k,l,m]);p&&(b=y&&c(y.symbol)?y.symbol:{},y=y&&f(y.indentation)?y.indentation:0,h=(h=(n=n.mapOfPosToGridNode)&&n[h])&&h.depth||1,a.x+=b.width+2*b.padding+(h-1)*y);return a},renderLabel:function(b){var d=this,g=d.pos,f=d.axis,h=d.label,k=f.mapOfPosToGridNode,l=f.options,n=q(d.options&&d.options.labels,l&&l.labels),
p=n&&c(n.symbol)?n.symbol:{},r=(k=k&&k[g])&&k.depth,l="treegrid"===l.type,t=!(!h||!h.element),g=-1<e(g,f.tickPositions);l&&k&&t&&h.addClass("highcharts-treegrid-node-level-"+r);b.apply(d,u(arguments));l&&k&&t&&0<k.descendants&&(f=F(f,k),J(d,{color:h.styles.color,collapsed:f,group:h.parentGroup,options:p,renderer:h.renderer,show:g,xy:h.xy}),p="highcharts-treegrid-node-"+(f?"expanded":"collapsed"),h.addClass("highcharts-treegrid-node-"+(f?"collapsed":"expanded")).removeClass(p),h.css({cursor:"pointer"}),
m([h,d.labelIcon],function(b){b.attachedTreeGridEvents||(a.addEvent(b.element,"mouseover",function(){var a=h;a.addClass("highcharts-treegrid-node-active");a.css({textDecoration:"underline"})}),a.addEvent(b.element,"mouseout",function(){var a=h,b=n,b=w(b.style)?b.style:{};a.removeClass("highcharts-treegrid-node-active");a.css({textDecoration:b.textDecoration})}),a.addEvent(b.element,"click",function(){d.toggleCollapse()}),b.attachedTreeGridEvents=!0)}))}});A(r.prototype,{collapse:function(a){var b=
this.axis,c=I(b,b.mapOfPosToGridNode[this.pos]);b.setBreaks(c,q(a,!0))},expand:function(a){var b=this.axis,c=K(b,b.mapOfPosToGridNode[this.pos]);b.setBreaks(c,q(a,!0))},toggleCollapse:function(a){var b=this.axis,c;c=b.mapOfPosToGridNode[this.pos];c=F(b,c)?K(b,c):I(b,c);b.setBreaks(c,q(a,!0))}});B.prototype.updateYNames=function(){var a=this.options,b=a.uniqueNames,d=!this.isXAxis,e=this.series,f=0;"treegrid"===a.type&&d&&(a=g(e,function(a,d){d.visible&&(m(d.options.data,function(b){c(b)&&(b.seriesIndex=
f,a.push(b))}),!0===b&&f++);return a},[]),a=G(a,b,!0===b?f:1),this.categories=a.categories,this.mapOfPosToGridNode=a.mapOfPosToGridNode,this.collapsedNodes=a.collapsedNodes,this.hasNames=!0,this.tree=a.tree)};B.prototype.utils={getNode:z.getNode}})(E,J,L)});
//# sourceMappingURL=treegrid.js.map
