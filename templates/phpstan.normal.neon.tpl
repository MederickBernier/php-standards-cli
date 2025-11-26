# Default / normal strictness configuration for PHPStan

parameters:
    level: 8

    paths:
        - src
        - app

    tmpDir: var/cache/phpstan

    inferPrivatePropertyTypeFromConstructor: true
    treatPhpDocTypesAsCertain: true

    reportUnmatchedIgnoredErrors: true

    checkMissingIterableValueType: true
    checkGenericClassInNonGenericObjectType: true
    checkMissingCallableSignature: true

    checkAlwaysTrueCheckTypeFunctionCall: true
    checkAlwaysTrueInstanceof: true
    checkAlwaysTrueComparison: true
    checkAlwaysTrueStrictComparison: true
    checkAlwaysTrueLateResolvableTypes: true

    checkExplicitMixed: false
    checkImplicitMixed: false

    ignoreErrors:
        # Add project-specific ignores here if needed.
