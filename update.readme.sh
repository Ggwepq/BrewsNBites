#!/bin/bash

# Fetch the latest commit history and organize by date
git log --format="%ad%x09%s" --date=format:'%Y-%m-%d' | sort -r > commits.txt

# Format commits into Markdown table
echo "| Date       | Description  |" > table.md
echo "|------------|-----------------|" >> table.md
while IFS=$'\t' read -r date message; do
  echo "| $date | $message |" >> table.md
done < commits.txt

# Update README with the Markdown table
sed -i '/<!-- COMMIT_TABLE_START -->/,/<!-- COMMIT_TABLE_END -->/d' README.md
sed -i '/<!-- COMMIT_TABLE_START -->/r table.md' README.md