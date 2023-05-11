/**
 * Builds the main ui builder shell
 * @since 3.0.0
 */
const { __, _x, _n, _nx } = wp.i18n;
export function moduleData() {
  return {
    data: function () {
      return {
        loading: false,
        globalSettings: {},
        search: '',
        ui: {
          strings: {
            siteSettings: __('Site settings', 'uipress-lite'),
            saveSettings: __('Save settings', 'uipress-lite'),
            settingsSaved: __('Settings saved', 'uipress-lite'),
            proOption: __('This is a pro option. Upgrade to unlock', 'uipress-lite'),
            searchSettings: __('Search settings', 'uipress-lite'),
          },
        },
      };
    },
    inject: ['uipData', 'router', 'uipress'],
    mounted: function () {
      this.loading = false;
      this.getSettings();
    },
    watch: {
      'uiTemplate.globalSettings': {
        handler(newValue, oldValue) {
          return;
          this.checkTemplateApplies();
        },
        deep: true,
      },
      'uiTemplate.globalSettings': {
        handler(newValue, oldValue) {
          return;
          this.checkTemplateApplies();
        },
        deep: true,
      },
    },
    computed: {
      returnGlobalSettings() {
        return this.globalSettings;
      },
    },
    methods: {
      getSettings() {
        let self = this;
        self.loading = true;

        let formData = new FormData();
        formData.append('action', 'uip_get_global_settings');
        formData.append('security', uip_ajax.security);

        self.uipress.callServer(uip_ajax.ajax_url, formData).then((response) => {
          self.loading = false;
          if (response.error) {
            self.uipress.notify(response.message, '', 'error', true);
            return;
          }

          //Get theme options
          this.getUserStyles();

          if (response.options) {
            if (self.uipress.isObject(response.options)) {
              if (Object.keys(response.options).length > 0) {
                self.globalSettings = response.options;
              }
            }
          }
        });
      },
      getUserStyles() {
        let self = this;

        //Build form data for fetch request
        let formData = new FormData();
        formData.append('action', 'uip_get_ui_styles');
        formData.append('security', uip_ajax.security);

        self.uipress.callServer(uip_ajax.ajax_url, formData).then((response) => {
          if (response.error) {
            return;
          }

          if (response.styles) {
            self.injectSavedStyles(response.styles);
          }
        });
      },
      injectSavedStyles(styles) {
        let themeStyles = this.uipData.themeStyles;
        for (let key in themeStyles) {
          let item = themeStyles[key];

          if (styles[item.name]) {
            if ('value' in styles[item.name]) {
              item.value = styles[item.name].value;
            }
            if ('darkValue' in styles[item.name]) {
              item.darkValue = styles[item.name].darkValue;
            }
          }
        }

        for (let key in styles) {
          let item = styles[key];
          if (item.user) {
            this.uipData.themeStyles[item.name] = item;
          }
        }
      },
      returnTemplateOption(group, option) {
        let key = option.uniqueKey;
        let options = this.globalSettings;
        if (!(group in options)) {
          options[group] = {};
        }
        if (!(key in options[group])) {
          if (option.accepts === String) {
            options[group][key] = '';
          }
          if (option.accepts === Array) {
            options[group][key] = [];
          }
          if (option.accepts === Object) {
            options[group][key] = {};
          }
          if (option.accepts === Boolean) {
            options[group][key] = false;
          }
        }
        return options[group][key];
      },
      saveTemplateOption(group, key, value) {
        let options = this.globalSettings;
        options[group][key] = value;
      },
      saveSettings() {
        let self = this;

        let sendData = self.uipress.uipEncodeJson(self.globalSettings);

        let styles = this.formatStyles();
        let stylesJson = JSON.stringify(styles, (k, v) => (v === 'true' ? 'uiptrue' : v === true ? 'uiptrue' : v === 'false' ? 'uipfalse' : v === false ? 'uipfalse' : v === '' ? 'uipblank' : v));

        let formData = new FormData();
        formData.append('action', 'uip_save_global_settings');
        formData.append('security', uip_ajax.security);
        formData.append('settings', sendData);
        formData.append('styles', stylesJson);

        self.uipress.callServer(uip_ajax.ajax_url, formData).then((response) => {
          if (response.error) {
            self.uipress.notify(response.message, '', 'error', true);
            return;
          }

          self.uipress.notify(self.ui.strings.settingsSaved, '', 'success', true);
        });
      },
      formatStyles() {
        let styles = this.uipData.themeStyles;
        let formatted = {};
        for (let key in styles) {
          if (styles[key].value) {
            if (!formatted[styles[key].name]) {
              formatted[styles[key].name] = {};
            }
            formatted[styles[key].name].value = styles[key].value;
          }
          if (styles[key].darkValue) {
            if (!formatted[styles[key].name]) {
              formatted[styles[key].name] = {};
            }
            formatted[styles[key].name].darkValue = styles[key].darkValue;
          }
          if (styles[key].user) {
            formatted[styles[key].name].user = styles[key].user;
            formatted[styles[key].name].label = styles[key].label;
            formatted[styles[key].name].name = styles[key].name;
            formatted[styles[key].name].type = styles[key].type;
          }
        }

        return formatted;
      },
      conditionalShowGroup(group) {
        if (!('condition' in group)) {
          return true;
        }

        return group.condition(this.globalSettings);
      },
      inSearch(option) {
        let sq = this.search.toLowerCase();
        let lqN = option.label.toLowerCase();
        let lqDes = option.help.toLowerCase();

        if (lqN.includes(sq) || lqDes.includes(sq)) {
          return true;
        }
        return false;
      },
    },
    template: `
    
      <uip-floating-panel closeRoute="/">
      
      
        <!-- Site settings -->
        <div class="uip-flex uip-w-100p uip-h-100p">
          <div class="uip-flex uip-flex-column uip-w-100p uip-max-h-100p uip-flex-no-wrap">
          
            <div class="uip-text-l uip-text-emphasis uip-padding-m uip-border-bottom">{{ui.strings.siteSettings}}</div>
            
            <div v-if="loading" class="uip-w-100p uip-flex uip-flex-middle uip-flex-center uip-padding-m"><loading-chart></loading-chart></div>
            
            <div v-if="!loading" class="uip-flex-grow uip-overflow-auto uip-flex uip-flex-column uip-row-gap-s uip-padding-m">
            
            
              <div class="uip-padding-xxs uip-border-round uip-flex uip-flex-center uip-gap-xxs">
                <div class="uip-icon uip-icon-l uip-text-muted">search</div>
                <input class="uip-blank-input uip-flex-grow" type="text" v-model="search" :placeholder="ui.strings.searchSettings">
              </div>
              
              
              
              <!--Searching Dynamic settings -->
              <div  v-if="search != ''" class="uip-padding-xs uip-flex uip-flex-column uip-row-gap-m">
                <template v-for="group in uipData.globalGroupOptions">
                    
                      <!--Loop through group settings -->
                      
                      <template v-for="option in group.settings">
                        <div v-if="conditionalShowGroup(option) && inSearch(option)" class="uip-flex uip-flex-column uip-row-gap-xs uip-flex-start">
                        
                          
                          <div class="uip-flex uip-gap-xxxs uip-flex-center">
                            <div class="uip-text-bold uip-text-muted">{{group.label}}</div>
                            <div class="uip-icon uip-text-muted">chevron_right</div>
                            <div class="uip-text-bold">{{option.label}}</div>
                          </div>
                          <div v-if="option.help" class="uip-text-s uip-text-muted">{{option.help}}</div>
                          
                          <a href="https://uipress.co?utm_source=uipressupgrade&utm_medium=referral" target="_BLANK" v-if="option.proOption" class="uip-padding-xxs uip-border-round uip-background-green-wash uip-text-s uip-link-default uip-no-underline">
                            {{ui.strings.proOption}}
                          </a>
                          
                          <component v-else :is="option.component" :value="returnTemplateOption(group.name, option)" :args="option.args"
                          :returnData="function(data){saveTemplateOption(group.name, option.uniqueKey, data)}"></component>
                        
                        </div>
                        
                      </template>
                    
                </template>
              </div>
              
              
              <!-- Dynamic settings -->
              <template v-else v-for="group in uipData.globalGroupOptions">
                <accordion :openOnTick="false" v-if="conditionalShowGroup(group)">
                  <template v-slot:title>
                    <div class="uip-flex-grow uip-flex uip-gap-xxs uip-flex-center uip-text-bold">
                      <div class="uip-icon">{{group.icon}}</div>
                      <div class="">{{group.label}}</div>
                    </div>
                  </template>
                  <template v-slot:content>
                    <div class="uip-padding-xs uip-flex uip-flex-column uip-row-gap-m">
                      <!--Loop through group settings -->
                      
                      <template v-for="option in group.settings">
                        <div v-if="conditionalShowGroup(option)"  class="uip-flex uip-flex-column uip-row-gap-xs uip-flex-start">
                        
                          <div class="uip-text-bold">{{option.label}}</div>
                          <div v-if="option.help" class="uip-text-s uip-text-muted">{{option.help}}</div>
                          
                          <a href="https://uipress.co?utm_source=uipressupgrade&utm_medium=referral" target="_BLANK" v-if="option.proOption" class="uip-padding-xxs uip-border-round uip-background-green-wash uip-text-s uip-link-default uip-no-underline">
                            {{ui.strings.proOption}}
                          </a>
                          
                          <component v-else :is="option.component" :value="returnTemplateOption(group.name, option)" :args="option.args"
                          :returnData="function(data){saveTemplateOption(group.name, option.uniqueKey, data)}"></component>
                        
                        </div>
                        
                      </template>
                      
                      <template v-if="group.name == 'theme'">
                        <list-variables></list-variables>
                      </template>
                      <!--End loop through group settings -->
                    </div>
                  </template>
                </accordion>
              </template>
              <!-- End dynamic settings -->
            </div>
            
            <div v-if="!loading" class="uip-flex uip-flex-right uip-padding-m">
            
              <button class="uip-button-primary" @click="saveSettings()">{{ui.strings.saveSettings}}</button>
              
            </div>
            
            
          </div>
        </div>
        
        <!-- site settings -->
      
      </uip-floating-panel>
      `,
  };
  return compData;
}
