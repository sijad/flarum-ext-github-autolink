System.register('sijad/github/autolink/components/GithubAutolinkSettingsModal', ['flarum/components/SettingsModal'], function (_export) {
  'use strict';

  var SettingsModal, GithubAutolinkSettingsModal;
  return {
    setters: [function (_flarumComponentsSettingsModal) {
      SettingsModal = _flarumComponentsSettingsModal['default'];
    }],
    execute: function () {
      GithubAutolinkSettingsModal = (function (_SettingsModal) {
        babelHelpers.inherits(GithubAutolinkSettingsModal, _SettingsModal);

        function GithubAutolinkSettingsModal() {
          babelHelpers.classCallCheck(this, GithubAutolinkSettingsModal);
          babelHelpers.get(Object.getPrototypeOf(GithubAutolinkSettingsModal.prototype), 'constructor', this).apply(this, arguments);
        }

        babelHelpers.createClass(GithubAutolinkSettingsModal, [{
          key: 'className',
          value: function className() {
            return 'GithubAutolinkSettingsModal Modal--small';
          }
        }, {
          key: 'title',
          value: function title() {
            return app.translator.trans('sijad-github-autolink.admin.settings.title');
          }
        }, {
          key: 'form',
          value: function form() {
            return [m(
              'div',
              { className: 'Form-group' },
              m(
                'label',
                null,
                app.translator.trans('sijad-github-autolink.admin.settings.main_repository')
              ),
              m('input', { className: 'FormControl',
                placeholder: app.translator.trans('sijad-github-autolink.admin.settings.repository_placeholder'),
                bidi: this.setting('sijad-github-autolink.repository') })
            )];
          }
        }]);
        return GithubAutolinkSettingsModal;
      })(SettingsModal);

      _export('default', GithubAutolinkSettingsModal);
    }
  };
});;
System.register('sijad/github/autolink/main', ['flarum/app', 'sijad/github/autolink/components/GithubAutolinkSettingsModal'], function (_export) {
  'use strict';

  var app, GithubSettingsModal;
  return {
    setters: [function (_flarumApp) {
      app = _flarumApp['default'];
    }, function (_sijadGithubAutolinkComponentsGithubAutolinkSettingsModal) {
      GithubSettingsModal = _sijadGithubAutolinkComponentsGithubAutolinkSettingsModal['default'];
    }],
    execute: function () {

      app.initializers.add('sijad-github-autolink', function () {
        app.extensionSettings['sijad-github-autolink'] = function () {
          return app.modal.show(new GithubSettingsModal());
        };
      });
    }
  };
});