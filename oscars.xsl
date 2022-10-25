<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
   
    <xsl:param name="year"/>
    <xsl:param name="category"/>
    <xsl:param name="nominee"/>
    <xsl:param name="info"/>
    <xsl:param name="won"/>
    
    <xsl:template match="/Oscars">
        <html>
            <head>
                <style>
                    .centred {
                      text-align: center;
                      font-size:15px;
                      font-weight: normal;
                    }
                    .centredHeading {
                        text-align: center;
                        font-size:15px;
                        font-weight: bold;
                      }
                    .redText {
                        color: red;
                    }
                </style>
            </head>
            <body>
                <xsl:choose>
                    <xsl:when test="Nomination[contains(Year,$year) and contains(Category,$category) and contains(Nominee,$nominee) 
                    and contains(Info,$info) and contains(Won,$won)]"> 
                        <table>
                            <th class ="centredHeading">Year</th>
                            <th class ="centredHeading">Category</th>
                            <th class ="centredHeading">Nominee</th>
                            <th class ="centredHeading">Info</th>
                            <th class ="centredHeading">Won?</th>
                            <xsl:apply-templates/>
                        </table>
                    </xsl:when>
                    <xsl:otherwise>
                        <p class="redText">No results found</p>
                    </xsl:otherwise>
                </xsl:choose>
            </body>
        </html>
    </xsl:template>

    <xsl:template match="Nomination">
        <xsl:if test="Year[contains(.,$year)] and Category[contains(.,$category)] and Nominee[contains(.,$nominee)] 
        and Info[contains(.,$info)] and Won[contains(.,$won)]"> 
            <tr>
                <td class="centred">
                    <xsl:value-of select="Year"/>
                </td>
                <td class="centred">
                    <xsl:value-of select="Category"/>
                </td>
                <td class="centred">
                    <xsl:value-of select="Nominee"/>
                </td>
                <td class="centred">
                    <xsl:value-of select="Info"/>
                </td>
                <td class="centred">
                    <xsl:value-of select="Won"/>
                </td>
            </tr>
        </xsl:if>
    </xsl:template> 
</xsl:stylesheet>
