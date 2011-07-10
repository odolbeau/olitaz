#!/bin/bash

# Clear cache
app/console cache:warmup

# Install assets
app/console assets:install web

# Clear cache
app/console cache:warmup
