/*!
 * Copyright (C) 2015 Angel Zaprianov <me@fire1.eu>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * Duplicate Fields version: 1.1.2
 */
!function(e){e.fn.duplicateElement=function(n){function t(e){e=e.parent(),e.find(n.class_remove).show(),e.find(n.class_remove).last().hide(),e.find(n.class_create).hide(),e.find(n.class_create).last().show()}function i(e,n){a(n),e.parent().append(n)}function a(a){console.log(a),a.find(n.class_create).unbind(),a.on("click",n.class_create,function(c){var l,o=e(this).parent(".dinamic-field"),r=e(this).parent();return o.length>0?l=o.clone():r.length>0&&(l=a.clone().addClass("dinamic-field")),i(a,l),s(a),"function"==typeof n.onCreate&&n.onCreate(l,e(this),c),t(a),c.preventDefault(),!1})}function s(i){i.on("click",n.class_remove,function(a){var s=e(this).parents(".dinamic-field"),c=e(this).parents(i);return s.length>0?s.remove():c.length>0&&(i.empty(),i.hide(),i.remove()),"function"==typeof n.onRemove&&n.onRemove(e(this)),t(i),a.preventDefault(),!1})}n=e.extend(e.fn.duplicateElement.defaults,n);var c=this;e(c).parent();return this.each(function(){var i=e(this);t(i),a(i),i.find(n.class_remove).first().hide(),s(i)})},e.fn.duplicateElement.defaults={tag_name:"div",tag_id:"#dinamic-fields",clone_model:"#clone-field-model",class_remove:".remove-this-fields",class_create:".create-new-fields",onCreate:"",onRemove:""}}(jQuery);


