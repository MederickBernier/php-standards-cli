# Basic / exploratory PHPStan config
# Goal: see obvious problems without exploding on legacy patterns.

parameters:
    level: 4

    paths:
        - src
        - app

    tmpDir: var/cache/phpstan

    inferPrivatePropertyTypeFromConstructor: true
    treatPhpDocTypesAsCertain: false

    # Be nice with mixed / legacy code.
    checkExplicitMixed: false
    checkImplicitMixed: false

    checkMissingIterableValueType: false
    checkGenericClassInNonGenericObjectType: false
    checkMissingCallableSignature: false

    reportUnmatchedIgnoredErrors: true

    ignoreErrors:
        # You can add project-specific ignores later if needed.
