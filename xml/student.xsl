<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/">
    <html>
      <body>
        <h1>Student Information</h1>
        <p>Name: <xsl:value-of select="student/name"/></p>
        <p>Age: <xsl:value-of select="student/age"/></p>
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>