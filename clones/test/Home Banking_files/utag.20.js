//tealium universal tag - utag.20 ut4.0.202306261124, Copyright 2023 Tealium.com Inc. All Rights Reserved.
try{(function(id,loader){var u={};utag.o[loader].sender[id]=u;if(utag===undefined){utag={};}if(typeof utag.ut=='undefined'){utag.ut={};}if(1==1){u.loader=function(o){var a,b,c,l;a=document;if(o.type==="iframe"){b=a.createElement("iframe");b.setAttribute("height","1");b.setAttribute("width","1");b.setAttribute("style","display:none");b.setAttribute("src",o.src);}else if(o.type==="img"){utag.DB("Attach img: "+o.src);b=new Image();b.src=o.src;return;}else{b=a.createElement("script");b.language="javascript";b.type="text/javascript";b.async=1;b.charset="utf-8";b.src=o.src;}if(o['data-domain-script']){b.setAttribute('data-domain-script',o['data-domain-script']);}if(o['data-document-language']){b.setAttribute('data-document-language',o['data-document-language']);}if(o.id){b.id=o.id;}if(typeof o.cb==="function"){if(b.addEventListener){b.addEventListener("load",function(){o.cb();},false);}else{b.onreadystatechange=function(){if(this.readyState==="complete"||this.readyState==="loaded"){this.onreadystatechange=null;o.cb();}};}}l=o.loc||"head";c=a.getElementsByTagName(l)[0];if(c){utag.DB("Attach to "+l+": "+o.src);if(l==="script"){c.parentNode.insertBefore(b,c);}else{c.appendChild(b);}}};}else{u.loader=utag.ut.loader;}
u.ev={'view':1};u.initialized=false;u.map={"onetrust_js":"data_domain_script"};u.extend=[function(a,b){try{if(1){if(/particulares\.bancosantander\.es/.test(b['dom.domain']))
b.onetrust_js="e0c4861b-d120-4d48-b034-0f2301630c95";else if(/particulares\.santander\.pre\.corp/.test(b['dom.domain']))
b.onetrust_js="e0c4861b-d120-4d48-b034-0f2301630c95-test";}}catch(e){utag.DB(e)}}];u.send=function(a,b){if(u.ev[a]||u.ev.all!==undefined){var c,d,e,f,i;u.data={"data_document_language":"true","base_url":"https://cdn.cookielaw.org/scripttemplates/otSDKStub.js",};for(c=0;c<u.extend.length;c++){try{d=u.extend[c](a,b);if(d==false)return}catch(e){}};for(d in utag.loader.GV(u.map)){if(b[d]!==undefined&&b[d]!==""){e=u.map[d].split(",");for(f=0;f<e.length;f++){u.data[e[f]]=b[d];}}}
u.loader_cb=function(){u.initialized=true;};if(!u.initialized){u.loader({"type":"script","src":u.data.base_url,"cb":u.loader_cb,"data-domain-script":u.data.data_domain_script,"data-document-language":u.data.data_document_language,"loc":"head","id":'utag_20'});}else{u.loader_cb();}
}
};utag.o[loader].loader.LOAD(id);})("20","santander.es-bol-particulares");}catch(error){utag.DB(error);}