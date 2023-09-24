#!/bin/bash

SCRIPTDIR="$(dirname "$0")"

for i in \
	backend/runtime \
	backend/web/assets \
	frontend/runtime \
	frontend/web/assets \
	console/runtime
do
	# Delete folder contents, but keep .gitignore
	find $SCRIPTDIR/../../$i/ \! -name ".gitignore" \! -wholename "$SCRIPTDIR/../../$i/" -delete

	echo $i DONE!
done
